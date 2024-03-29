<?php
$config_file = file_get_contents('data.json');
$config = json_decode($config_file, true);

$host = $config['host'];
$dbname = $config['dbname'];
$username = $config['username'];
$password = $config['password'];

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lname = isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : "";
    $fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : "";
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : "";

    if (!empty($lname) && !empty($fname) && !empty($phone) && !empty($email) && !empty($message)) {
        $requete = $bdd->prepare('INSERT INTO form (lname, fname, phone, email, message) VALUES (?, ?, ?, ?, ?)');
        $requete->execute([$lname, $fname, $phone, $email, $message]);

        header("Location: index.php");
        exit();
    } else {
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="imgs/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ogier Grégoire</title>
</head>

<body>

    <div class="gradient-background"></div>
    <section class="hero">
        <div class="title">
            <div>
                <h1 class="title1">Ogier</h1>
                <img src="imgs/acnsplash.jpg" alt="test" class="img1">
            </div>
            <div>
                <img src="imgs/acnsplash.jpg" alt="test" class="img2">
                <h1 class="title2">Grégoire</h1>
            </div>
            <div>
                <h1 class="title3">Dev Web</h1>
            </div>
        </div>
    </section>

    <nav class="navbar">
        <div class="container">
            <a href="#about">
                <span>À propos</span>
                <i class="fas fa-user"></i>
            </a>
            <a href="#skills">
                <span>Compétences</span>
                <i class="fas fa-pen-ruler"></i>
            </a>
            <a href="#projects">
                <span>Projets</span>
                <i class="fas fa-layer-group"></i>
            </a>
            <a href="#experience">
                <span>Expériences</span>
                <i class="fas fa-timeline"></i>
            </a>
            <a href="#contact">
                <span>Contact</span>
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </nav>

    <!-- about -->

    <section id="about" class="scroll-checkpoint">
        <div class="heading">
            <h1>À propos de moi</h1>
        </div>
        <div class="container">
            <div class="profile-img">
                <div class="card">
                    <img src="imgs/moi.jpg"
                        alt="test" class="img1">
                </div>
            </div>
            <div>
                <p>
                    Je suis Grégoire Ogier, actuellement étudiant en seconde année à la normandiewebcshool dans le cadre de mes études en temps que développeur web full stack.
                </p>
                <p>
                    Passionné par le développement web, les jeux vidéo, et l’IA, je vise un diplôme de Chef de projets digitaux - Développeur Web.
                </p>
                <p>
                    Mon expérience englobe la création de chatbot, l’intégration d’api, WordPress, des projets associatifs, et le développement web front-end et back-end.
                </p>
                <p class="dev-name">
                    OGIER Grégoire
                </p>
            </div>
        </div>
    </section>

    <!-- skills -->

    <section id="skills" class="scroll-checkpoint">
        <div class="heading">
            <h1>Compétences</h1>
        </div>
        <div class="container">
            <div class="main-skills">
                <div class="skill">
                    <i class="fab fa-html5"></i>
                    <div>
                        <h3 class="skill-name">html</h3>
                        <div class="progress-bar">
                            <progress class="skill-progress" value="90" max="100"></progress>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <i class="fab fa-css3"></i>
                    <div>
                        <h3 class="skill-name">css</h3>
                        <div class="progress-bar">
                            <progress class="skill-progress" value="80" max="100"></progress>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <i class="fab fa-js"></i>
                    <div>
                        <h3 class="skill-name">javascript</h3>
                        <div class="progress-bar">
                            <progress class="skill-progress" value="50" max="100"></progress>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <i class="fab fa-php"></i>
                    <div>
                        <h3 class="skill-name">php</h3>
                        <div class="progress-bar">
                            <progress class="skill-progress" value="40" max="100"></progress>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <i class="fab fa-python"></i>
                    <div>
                        <h3 class="skill-name">python</h3>
                        <div class="progress-bar">
                            <progress class="skill-progress" value="70" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other-skills">
                <p>
                    <b>déploiement :</b>
                    je sais déployer un site web en ligne à l'aide d'un vps debian et d'ovh.
                </p>
                <p>
                    <b>maquetage :</b>
                    j'ai appris à utilisé figma pour faire des whireframe et maquette pour mes projets.
                </p>
                <!-- <p>
                    <b>programming languages :</b>
                    lorem
                </p>
                <p>
                    <b>programming languages :</b>
                    lorem
                </p>
                <p>
                    <b>programming languages :</b>
                    lorem
                </p>
                <p>
                    <b>programming languages :</b>
                    lorem
                </p> -->
            </div>
        </div>
    </section>

    <!-- projects -->

    <section id="projects" class="scroll-chekpoint">
        <div class="heading">
            <h1>Projets</h1>
        </div>
        <div class="container">
            <div class="gallery">
                <div class="gallery-controls">
                    <button type="button">
                        <a href="https://github.com/2bleG/Boty" target="_blank">boty</a>
                    </button>
                    <button type="button" data-btn="1">
                        <a href="https://nuit.normandiewebschool.fr/" target="_blank">la nuit de la nws</a>
                    </button>
                    <button type="button" data-btn="2">
                        <a href="https://marommetennis.fr/" target="_blank">maromme tennis</a>
                    </button>
                </div>
                <!-- <div class="images">
                        <img src="imgs/acnsplash.jpg"
                        alt="test" data-img="1">
                        <img src="imgs/acnsplash.jpg"
                        alt="test" data-img="2">
                        <img src="imgs/acnsplash.jpg"
                        alt="test" data-img="3">
                        <img src="imgs/acnsplash.jpg"
                        alt="test" data-img="4">
                </div> -->
            </div>
        </div>
    </section>

    <!-- experience -->

    <section id="experience" class="scroll-checkpoint">
        <div class="heading">
            <h1>Expériences</h1>
        </div>
        <div class="timeline">
            <div class="checkpoint">
                <div>
                    <h2>
                        Mes études
                    </h2>
                    <ol>
                        <li>
                            2017-2021 | Lycée Augustin Fresnel-Bernay <br>
                            J'ai obtenu mon Bac STI2D option SIN.
                        </li>
                        <li>
                            2022 | ESCCI-Evreux <br>
                            J'ai par la suite effectué une formation non qualifiante "Préparation aux métiers du numérique"
                        </li>
                        <li>
                            2022-2024 | NWS-Rouen <br>
                            Et je suis actuellement en cursus à la Normandie Web School pour passer mon Bachelor chef de projet spécialisation développeur (2022-2025).
                        </li>
                    </ol>
                </div>
            </div>
            <div class="checkpoint">
                <div>
                    <h2>
                        Mes expériences professionnel
                    </h2>
                    <ol>
                        <li>
                            Stage de 3ème en 2017 <br>
                            Lors de ce stage j’ai découvert les bases du métier d’architecte, dans le cabinet d’architecture Les ateliers d'Avre et d'Iton.
                        </li>
                        <li>
                            Stage de validation de formation à l'ESCCI en 2022 <br>
                            J'ai fait ce stage à l'ESCCI chez Altameos Multimédia, en 2022. J'y ai appris à developper un site web ainsi qu'à le sécuriser.
                        </li>
                        <li>
                            Stage de validation d’année 1 à la NWS en 2023 <br>
                            Durant ce stage j’ai développé une API pour une marketplace, chez Altameos Multimédia.
                        </li>
                    </ol>
                </div>
            </div>
            <div class="checkpoint">
                <div>
                    <h2>
                        Mes projets personnel
                    </h2>
                    <ol>
                        <li>
                            creation d'un chatbot <br>
                            En me servant de l'api de LLama2 j'ai créer un chatbot personnalisé sur la stack Flask de python.
                        </li>
                        <li>
                            la nuit de la nws <br>
                            J'ai participer à la création d'un site web ainsi qu'une application pour un évènement à la normandie web school.
                        </li>
                        <li>
                            Unity et C# <br>
                            Dans le cadre d'un défi personnel que je me suis lancé j'ai appris à utilisé unity et c# pour créer des fonctions utilisé dans la conception de jeux vidéos.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- contact -->

    <section id="contact" class="scroll-chekpoint">
        <div class="heading">
            <h1>Contact</h1>
        </div>
        <div class="call-to-action">
            <div>
                <h2>Travaillons ensemble !</h2>
                <a href="#contact" class="btn-main" onclick="openPopup()">
                    <span>contacter moi</span>
                </a>
            </div>
        </div>

        <div class="popup" id="contactPopup">
            <div class="popup-content">
                <span class="close-popup" onclick="closePopup()">&times;</span>
                <h2>Me contacter</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="leftForm">
                        <label for="fname">Nom</label>
                        <input type="text" id="fname" name="fname" required>
                        
                        <label for="lname">Prénom</label>
                        <input type="text" id="lname" name="lname" required>
                    </div>
                    <div class="rightForm">
                        <label for="phone">Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone" required>
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
        
        <div class="dark-bg">
            <div class="container">
                <div class="social-media">
                    <a href="https://www.linkedin.com/in/gr%C3%A9goire-ogier-367299239/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://github.com/2bleG" target="_blank"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>gregoireogier.fr</p>
    </footer>

    <div class="tracker"></div>

    <div class="preloader">
        <div class="loader">
            <span></span>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
</body>

</html>