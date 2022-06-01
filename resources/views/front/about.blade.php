@extends('front/layout')
@section('page_title','About Page')
@section('container')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: green;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: white;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>Who we are</h1>
  <p>We've heard the wise say-"This or that whatever befall the farmer must feed them all". Countless superheroes have been born on earth,while many are fictional, a handful are real</p>
  <p>ORGANI SHOP aims at unlocking for you access to safe-to-eat, pesticides free vegetables directly sourced from our farmers.</p>
</div>

<h2 style="text-align:center">Our Core Values</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="storage/media/env.jpg" alt="Jane" style="width:100%">
      
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img src="storage/media/food.jpg" alt="Jane" style="width:100%">
      
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img src="storage/media/farm.jpg" alt="Jane" style="width:100%">
      
    </div>
  </div>
</div>

</body>
</html>
@endsection