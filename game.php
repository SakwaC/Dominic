<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC E-Learning Games</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #54b38e;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            font-style: italic;
            text-decoration: underline;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none;
            margin-top: 20px;
            border-radius: 8px;
        }
        P{
            text-align: center;
            font-size: medium;
        }
        .game-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}
.game-item {
    flex: 1 1 calc(33.333% - 20px);
    box-sizing: border-box;
}
    @media (max-width:768px){
        .game-item{
            flex:1 1 100%;
        }
    }


    </style>
</head>
<body>
    <div class="container">
        <h1>PLAY  GAMES</h1>
        <p>Enjoy these educational games while using the CBC e-learning platform.</p>

    </div>
    <div class="game-list">
    <div class="game-item">
        <h2>Critical Thinking Challenge</h2>
        <iframe src="https://www.puzzleprime.com/logic/logic-puzzles/" width="800" height="600" allowfullscreen></iframe>

    </div>
    <div class="game-item">
        <h2>Math Quest</h2>
        
        <iframe src="https://phet.colorado.edu/sims/html/arithmetic/latest/arithmetic_en.html" width="800" height="600" allowfullscreen></iframe> 
</div>

</body>
</html>
