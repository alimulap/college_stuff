use csv::ReaderBuilder;
use ndarray::{s, Array, Array1, Array2};
use ndarray_csv::Array2Reader;

fn main() {
    let mut data_reader = ReaderBuilder::new()
        .has_headers(false)
        .comment(Some(b'#'))
        .from_path("data.csv")
        .unwrap();

    let data: Array2<f64> = data_reader.deserialize_array2_dynamic().unwrap();

    let mut alt_reader = ReaderBuilder::new()
        .has_headers(false)
        .from_path("alternatives.csv")
        .unwrap();

    let alts: Vec<String> = alt_reader
        .records()
        .map(|x| x.unwrap().get(0).unwrap().to_string())
        .collect();

    // Split data untuk bobot dan matrix keputusan
    let bobot: Array1<f64> = data.slice(s![-1, ..]).to_owned();
    let mut matrix = data.slice(s![..-1, ..]).to_owned();

    if matrix.shape()[0] != alts.len() {
        panic!("Jumlah alternatif tidak sesuai dengan jumlah kolom matrix keputusan");
    }

    println!("Matrix keputusan:\n");
    for i in 0..matrix.shape()[0] {
        print!(
            "{:width$}: {:.2} ",
            alts[i],
            matrix.slice(s![i, ..]),
            // hanya untuk formatting
            width = alts
                .iter()
                .max_by(|a, b| a.len().cmp(&b.len()))
                .unwrap()
                .len() + 1
        );
        println!();
    }
    println!();

    for j in 0..matrix.shape()[1] {
        let min = matrix
            .slice(s![.., j])
            .iter()
            .min_by(|a, b| a.partial_cmp(b).unwrap())
            .unwrap()
            .clone();
        let max = matrix
            .slice(s![.., j])
            .iter()
            .max_by(|a, b| a.partial_cmp(b).unwrap())
            .unwrap()
            .clone();
        for i in 0..matrix.shape()[0] {
            matrix[[i, j]] = (matrix[[i, j]] - min) / (max - min);
        }
    }
    println!(
        "Normalisasi matrix keputusan:\n{:.3}\n",
        matrix.slice(s![.., ..])
    );

    matrix *= &bobot;
    matrix += &bobot;
    println!(
        "Pembobotan matrix keputusan:\n{:.3}\n",
        matrix.slice(s![.., ..])
    );

    let mut mat_g = Array::<f64, _>::zeros(matrix.shape()[1]);
    for j in 0..matrix.shape()[1] {
        mat_g[j] += matrix[[0, j]];
        for i in 1..matrix.shape()[0] {
            mat_g[j] *= matrix[[i, j]];
        }
        mat_g[j] = mat_g[j].powf(1.0 / matrix.shape()[0] as f64);
    }
    println!(
        "Matriks area perkiraan batas:\n {:.3}\n",
        mat_g.slice(s![..])
    );

    matrix -= &mat_g;
    println!(
        "Perhitungan matriks jarak elemen alternatif dari batas perkiraan daerah (Q):\n{:7.3}\n",
        matrix.slice(s![.., ..])
    );

    let nilai_alternatif = matrix.sum_axis(ndarray::Axis(1));
    for i in 0..nilai_alternatif.len() {
        println!(
            "Nilai alternatif {:width$}: {:7.3}",
            alts[i],
            nilai_alternatif[i],
            // hanya untuk formatting
            width = alts
                .iter()
                .max_by(|a, b| a.len().cmp(&b.len()))
                .unwrap()
                .len()
                + 1
        );
    }
    println!();

    let max = nilai_alternatif
        .iter()
        .max_by(|a, b| a.partial_cmp(b).unwrap())
        .unwrap()
        .clone();

    println!(
        "Alternative terbaik adalah: {} dengan nilai {:.3}",
        alts[nilai_alternatif.iter().position(|&x| x == max).unwrap()],
        max
    );
}
