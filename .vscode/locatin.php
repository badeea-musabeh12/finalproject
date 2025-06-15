<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental Store</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: white;
    }

    header {
      background-color: #3ab4f2;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 40px;
    }

    header img {
      height: 80px;
    }

    nav {
      display: flex;
      gap: 30px;
      font-size: 24px;
      font-style: italic;
      font-weight: bold;
    }

    nav a {
      color: white;
      text-decoration: none;
    }

    .login-btn {
      background-color: white;
      color: #3ab4f2;
      padding: 10px 25px;
      border-radius: 30px;
      font-weight: bold;
      font-size: 18px;
      border: none;
      cursor: pointer;
    }

    .main-content {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
      gap: 50px;
    }

    .main-content img {
      max-width: 400px;
    }

    .text {
      max-width: 600px;
      font-size: 16px;
      line-height: 1.7;
      color: #0086d1;
      font-weight: 500;
    }

    .location-button {
      display: flex;
      justify-content: center;
      margin: 40px 0;
    }

    .location-link {
      background-color: #3ab4f2;
      color: white;
      padding: 20px 60px;
      font-size: 24px;
      border-radius: 4px;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .main-content {
        flex-direction: column;
        text-align: center;
      }
      nav {
        flex-direction: column;
        gap: 10px;
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <img src="c:\Users\DELL\OneDrive\Pictures\3.png" alt="Logo" />
    <nav>
      <a href="#">Home</a>
      <a href="#">Cars</a>
      <a href="#">Location</a>
      <a href="#">Contact us</a>
    </nav>
    <button class="login-btn">Log in</button>
  </header>

  <div class="main-content">
    <img src="c:\Users\DELL\OneDrive\Pictures\3.png" alt="Car">
    <div class="text">
      <p>Welcome to our car rental store, conveniently located in the heart of the town of Deir Dibwan, Ramallah.</p>
      <p>Our store is easily accessible and serves as a central destination for all your car rental needs. Whether you're a local resident or a traveler exploring the area, reaching us is incredibly easy.</p>
      <p>We are strategically located in the town center, right next to Al-Noor Supermarket and near Al-Amanah Exchange, making the pick-up and drop-off of your rental car smooth and convenient.</p>
      <p>Upon arrival, our friendly staff will warmly welcome you, ensuring a seamless and efficient rental experience from start to finish.</p>
    </div>
  </div>

  <div class="location-button">
    <a href="https://www.google.com/maps/place/Deir+Dibwan,+Ramallah/" target="_blank" class="location-link">
      Geographical location
    </a>
  </div>

</body>
</html>
