<?php
    $res = 0;  

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['x']) && isset($_GET['c']) && isset($_GET['y'])) {
        $x = $_GET['x'];
        $c = $_GET['c'];
        $y = $_GET['y'];
        
        if ($c == '+') $res = $x + $y;
        if ($c == '-') $res = $x - $y;
        if ($c == '*') $res = $x * $y;
        if ($c == '/') { 
            if ($y != 0) {
                $res = $x / $y;
            } else {
                $res = 'Error: Division by zero';
            }
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculator</title>
        <style>
body {
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f3f4f6;
    margin: 0;
}

.calculator {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    width: 320px;
    max-width: 100%;
}

.result {
    font-size: 2.2em;
    font-weight: 300;
    text-align: right;
    background-color: #f0f0f0;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    color: #333;
    word-wrap: break-word; 
}

input, select {
    padding: 12px;
    margin: 8px 0;
    font-size: 1em;
    border-radius: 8px;
    border: 1px solid #ccc;
    width: 100%;
    box-sizing: border-box;
    background-color: #fafafa;
    color: #333;
}

input:focus, select:focus {
    border-color: #007bff;
    outline: none;
    background-color: #ffffff;
}

input[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    cursor: pointer;
    padding: 12px;
    font-size: 1.1em;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

input[type="reset"] {
    background-color: #6c757d;
    color: #ffffff;
    border: none;
    cursor: pointer;
    padding: 12px;
    font-size: 1.1em;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

input[type="reset"]:hover {
    background-color: #5a6268;
}

select {
    appearance: none;
    background-color: #fafafa;
    background-size: 12px;
}

button {
    background-color: #28a745;
    font-size: 1em;
    border-radius: 8px;
    color: #ffffff;
    border: none;
    padding: 12px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838;
}
        </style>
        <script>
            function clearResult() {
                document.getElementById('result').value = '';
            }
        </script>
    </head>
    <body>
        <div class="calculator">
            <form action="index.php" method="get">
               <div class="result">
               <input id ='result' value="<?php echo htmlspecialchars($res); ?>" readonly>
               </div>
                <div>
                    <label for="num1">Number 1</label>
                    <input name="x" type="number" id="num1" required>
                </div>
                <div>
                    <label for="operation">Operation</label>
                    <select name="c" id="operation" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>
                <div>
                    <label for="num2">Number 2</label>
                    <input name="y" type="number" id="num2" required>
                </div>
                <div>
                    <input type="submit" value="=">
                </div>
                <button onclick="clearResult()">AC</button>
            </form>
        </div>
    </body>
</html>
