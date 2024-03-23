<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <?php
        $categories = ['food-beverage', 'beauty-health', 'home-care', 'baby-kid'];
    ?>
    <ul>
        @foreach($categories as $category)
            <li><a href="/category/{{ $category }}">{{ $category }}</a></li>
        @endforeach
    </ul>
</body>
</html>
