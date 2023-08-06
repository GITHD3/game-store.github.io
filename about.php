<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <style>
        .navbar {
            position: sticky;
            top: 0;
            z-index: 12;
        }

        body {
            overflow-y: smooth;
        }

        /* Hide scrollbar */
        ::-webkit-scrollbar {
            display: none;
        }

        /* Rest of your styles... */
    </style>
</head>

<body class="west">
    <div class="mainsplit">
        <?php session_start(); ?>
        <?php include 'navbar.php'; ?>

        <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css"
            rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>



        <style>
            .scrollbar {
                overflow: hidden;
                /* Hide the scrollbar */
            }

            body {
                background: linear-gradient(120deg, slateblue , #1F456E);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            #about-section {
                position: relative;
                font-weight: bold;
            }

            .text-muted2 {
                color: black !important;
            }

            .blockabout2 {
                padding: 20px;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 20px;
                font-weight: bold;
                background: linear-gradient(to right, dodgerblue 0%, lightpink 100%);
                border-radius: 16px;
                backdrop-filter: blur(7px);
                -webkit-bakdrop-filter: blur(7px);
            }

            .blockabout2-inner2 {
                padding: 30px;
                border: 1px solid rgba(32, 33, 36, 0.1);
                box-shadow: rgba(0, 0, 0, 0.8) 0px 30px 100px 10px;

            }
        </style>



        <section id="about-section" class="pt-5 pb-5">
            <div class="container wrapabout">
                <div class="blockabout2">
                    <div class="blockabout2-inner2 text-center text-sm-start">
                        <div class="title-big pb-3 mb-3">
                            <h3>ParaCrash Game Store</h3>
                            <h3>- About Us</h3>
                        </div>
                        <p class="description-p text-muted2 pe-0 pe-lg-0" style="color: #000000;">
                            Welcome to our online game store, your ultimate destination for all things gaming!
                            We are passionate gamers ourselves, and we understand the thrill and excitement that
                            comes with diving into virtual worlds, conquering challenges, and creating unforgettable
                            gaming moments. Our mission is to provide you with a seamless and enjoyable gaming
                            experience, offering a vast selection of games, consoles, and accessories, along with
                            exceptional customer service and a thriving gaming community.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>Game Selection:</b> <br>
                            Our game store boasts an extensive and carefully curated collection of games from a
                            variety of genres and platforms. Whether you're into action, adventure, role-playing,
                            strategy, sports, or indie titles, we have something for everyone. We pride ourselves on
                            staying up to date with the latest releases and trends, ensuring that you always have
                            access to the hottest games on the market. Additionally, we showcase lesser-known gems
                            that deserve recognition, allowing you to discover new and exciting titles that you
                            might not find elsewhere.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>Consoles and Accessories:</b> <br>
                            To enhance your gaming experience, we offer a comprehensive range of gaming consoles,
                            accessories, and peripherals. Whether you prefer playing on consoles, PCs, or mobile
                            devices, we have the latest systems and hardware to take your gaming to the next level.
                            From state-of-the-art gaming consoles and high-performance gaming PCs to immersive
                            virtual reality headsets and precision gaming controllers, we provide everything you
                            need to optimize your gameplay and immerse yourself in the virtual worlds you love.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>Customer Service:</b><br>
                            We take pride in exceptional customer service, ensuring your satisfaction. Our dedicated
                            team of gaming enthusiasts is ready to assist with inquiries, recommendations, and
                            troubleshooting. Personalized assistance helps you make informed decisions and find the
                            perfect games and accessories. Building strong relationships and exceeding expectations
                            is our commitment.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>Gaming Community:</b><br>
                            Gaming is more than a solitary activity. It's about connecting with like-minded
                            individuals, sharing experiences, and fostering belonging. We build a vibrant gaming
                            community for all backgrounds and skill levels. Join forums, participate in competitions
                            and events, and stay updated with gaming news. Connect, learn, and grow as a gamer.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>Secure and Convenient Shopping:</b><br>
                            We prioritize secure and convenient online shopping. Our user-friendly website allows
                            easy navigation, detailed descriptions, and hassle-free purchases. State-of-the-art
                            encryption ensures personal information safety. Multiple payment options and fast
                            shipping ensure prompt delivery for seamless gaming adventures.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            <b>We value your feedback:</b><br>
                            Your satisfaction is our priority, and we constantly improve based on your feedback.
                            Share suggestions, comments, and experiences to help us deliver a top-notch gaming store
                            experience tailored to your needs.
                        </p>
                        <p class="description-p text-muted2 pe-0 pe-lg-0">
                            Thank you for choosing ParaCrash Game Store. Let's embark on exciting gaming journeys
                            together!
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </div>
</body>

</html><?php include 'footer.php'; ?>