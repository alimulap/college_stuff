use std::{collections::HashMap, error::Error, io, process};

fn main() {
    let mut data = match parse_csv() {
        Ok(v) => v,
        Err(e) => {
            eprintln!("Error: {}", e);
            process::exit(1);
        }
    };

    normalisasi(data.get_mut(&C1).unwrap(), C1.attr_type);
    normalisasi(data.get_mut(&C2).unwrap(), C2.attr_type);
    normalisasi(data.get_mut(&C3).unwrap(), C3.attr_type);
    normalisasi(data.get_mut(&C4).unwrap(), C4.attr_type);
    normalisasi(data.get_mut(&C5).unwrap(), C5.attr_type);

    println!("\nWSM: ");
    for i in 0..data.get(&C1).unwrap().len() {
        let result = hitung_wsm(
            &vec![
                data.get(&C1).unwrap()[i],
                data.get(&C2).unwrap()[i],
                data.get(&C3).unwrap()[i],
                data.get(&C4).unwrap()[i],
                data.get(&C5).unwrap()[i],
            ],
            &vec![C1.weight, C2.weight, C3.weight, C4.weight, C5.weight],
        );
        println!("Alternatif {}: {}", i + 1, result);
    }

    println!("\nWPM: ");
    for i in 0..data.get(&C1).unwrap().len() {
        let result = hitung_wpm(
            &vec![
                data.get(&C1).unwrap()[i],
                data.get(&C2).unwrap()[i],
                data.get(&C3).unwrap()[i],
                data.get(&C4).unwrap()[i],
                data.get(&C5).unwrap()[i],
            ],
            &vec![C1.weight, C2.weight, C3.weight, C4.weight, C5.weight],
        );
        println!("Alternatif {}: {}", i + 1, result);
    }
}

fn parse_csv<'a>() -> Result<HashMap<Criteria<'a>, Vec<f64>>, Box<dyn Error>> {
    let mut result = HashMap::from([ (C1, vec![]), (C2, vec![]), (C3, vec![]), (C4, vec![]), (C5, vec![]), ]);
    let mut rdr = csv::Reader::from_reader(io::stdin());
    let records = rdr.records().collect::<Result<Vec<_>, _>>()?;
    for i in 0..records.len() {
        let record = &records[i];
        result
            .get_mut(&C1)
            .unwrap()
            .push(match record[1].parse::<String>()?.as_str() {
                "kurang" => 1.,
                "sedang" => 2.,
                "baik" => 3.,
                "baik sekali" => 4.,
                _ => return Err("Invalid input".into()),
            });
        result.get_mut(&C2).unwrap().push(record[2].parse::<f64>()?);
        result.get_mut(&C3).unwrap().push(record[3].parse::<f64>()?);
        result.get_mut(&C4).unwrap().push(record[4].parse::<f64>()?);
        result.get_mut(&C5).unwrap().push(record[5].parse::<f64>()?);
    }
    Ok(result)
}

fn normalisasi(data: &mut Vec<f64>, attr_type: AttrType) {
    let mut result = vec![];
    match attr_type {
        AttrType::Benefit => {
            let max = data.max_el();
            for &i in data.iter() {
                result.push(i as f64 / max as f64);
            }
        }
        AttrType::Cost => {
            let min = data.min_el();
            for &i in data.iter() {
                result.push(min as f64 / i as f64);
            }
        }
    };
    *data = result;
}

fn hitung_wsm(values: &Vec<f64>, weights: &Vec<i32>) -> f64 {
    let mut result = 0.;
    for i in 0..values.len() {
        result += values[i] * weights[i] as f64 / 100.;
    }
    result
}

fn hitung_wpm(values: &Vec<f64>, weights: &Vec<i32>) -> f64 {
    let mut result = 1.;
    for i in 0..values.len() {
        let after_powered = values[i].powf(weights[i] as f64 / 100.);
        result *= after_powered;
    }
    result
}

#[allow(dead_code)]
#[derive(Debug, PartialEq, Eq, Hash)]
struct Criteria<'a> {
    name: &'a str,
    weight: i32,
    attr_type: AttrType,
}

#[derive(Debug, PartialEq, Eq, Hash)]
enum AttrType {
    Benefit,
    Cost,
}

const C1: Criteria = Criteria { name: "fasilitas pendukung", weight: 30, attr_type: AttrType::Benefit, }; 
const C2: Criteria = Criteria { name: "harga bangunan / m2", weight: 20, attr_type: AttrType::Cost, };
const C3: Criteria = Criteria { name: "tahun konstruksi bangunan", weight: 20, attr_type: AttrType::Cost, }; 
const C4: Criteria = Criteria { name: "jarak dari tempat kerja (km)", weight: 20, attr_type: AttrType::Cost, }; 
const C5: Criteria = Criteria { name: "sistem keamanan apartment", weight: 10, attr_type: AttrType::Benefit, }; 

trait MaxMin {
    fn max_el(&self) -> f64;
    fn min_el(&self) -> f64;
}

impl MaxMin for Vec<f64> {
    fn max_el(&self) -> f64 {
        let mut max = self[0];
        for &i in self.iter() {
            if i > max {
                max = i;
            }
        }
        max
    }

    fn min_el(&self) -> f64 {
        let mut min = self[0];
        for &i in self.iter() {
            if i < min {
                min = i;
            }
        }
        min
    }
}
