<x-main>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .about-container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            text-align: center;
            background: url('/images/image.png') no-repeat center center;
            background-size: cover;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .team-member {
            width: 150px;
            height: 150px;
            background-color: rgb(67, 74, 190);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .team-member h3 {
            margin: 0;
            font-size: 16px;
            text-align: center;
        }
    </style>

    <div class="about-container">
        <h1>About Us</h1>
        <p>We are a team of 7 dedicated individuals working together on the FlexIntensity project. Our goal is to create a visualization tool that provides insights into the changing load of the power grid based on weather conditions.</p>

        <div class="team-members">
            <div class="team-member">
                <h3>Alisiia Mishchenko</h3>
            </div>
            <div class="team-member">
                <h3>Anan Li</h3>
            </div>
            <div class="team-member">
                <h3>Anne van den Berg</h3>
            </div>
            <div class="team-member">
                <h3>Dima Fylypenko</h3>
            </div>
            <div class="team-member">
                <h3>Georgy Furss</h3>
            </div>
            <div class="team-member">
                <h3>Rayan Samman</h3>
            </div>
            <div class="team-member">
                <h3>Wesley de Ruiter</h3>
            </div>
        </div>
    </div>
</x-main>
