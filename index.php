<!DOCTYPE html>
<html dir="rtl">
<head>
  <title>نظام إدارة المدارس / Système de gestion scolaire</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(45deg, #FFC0CB, #87CEFA);
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 100%;
      align-items: center;
      padding: 0 20px;
    }

    .button {
      padding: 20px;
      font-size: 20px;
      background-color: #f2f2f2;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
      max-width: 450px;
      box-sizing: border-box;
      font-family: 'Readex Pro', sans-serif;
    }

    .button:hover {
      background-color: #e6e6e6;
    }
  </style>
</head>
<body>
  <div class="button-container">
    <button class="button" onclick="window.location.href='student'">فضاء التلاميذ / Espace des élèves</button>
    <button class="button" onclick="window.location.href='teacher'">فضاء الأساتذة / Espace des enseignants</button>
    <button class="button" onclick="window.location.href='admin'">فضاء الإدارة / Espace de gestion</button>
  </div>
</body>
</html>