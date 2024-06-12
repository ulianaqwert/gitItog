<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вам сюда нельзя</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap');

    * {
        font-family: "Exo 2", sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .notUserOrAdmin {
        height: 100vh;
        background: linear-gradient(184deg, rgba(255, 76, 77, 1) 0%, rgba(255, 39, 32, 1) 100%);
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .notUserOrAdmin__block {
        width: 60vw;
        text-align: center;
    }

    .notUserOrAdmin__block h1 {
        padding: 50px 0px 20px 0px;
        font-size: 4vw;
        color: white;
    }

    .notUserOrAdmin__block img {
        width: 15vw;
    }

    a {
        /* font-size: 1.9vw; */
        color: white;
        text-decoration: none
    }

    @media(max-width:750px) {

        a {
            font-size: 2vw;
        }
    }

    @media(max-width:600px) {

        .notUserOrAdmin__block h1 {
            padding: 30px 0px 10px 0px;
            font-size: 6vw;
        }

        .notUserOrAdmin__block img {
            width: 30vw;
        }

        a {
            font-size: 3vw;
        }
    }
</style>

<body>
    <div class="notUserOrAdmin">
        <div class="notUserOrAdmin__block">
            <img src="/image/notUserOrAdmin.png" alt="img">
            <h1>У вас нет доступа к этой странице</h1>
            <a href="{{ route('index') }}">Перейти на главную страницу</a>
        </div>
    </div>
</body>

</html>
