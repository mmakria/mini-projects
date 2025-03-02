document.addEventListener("DOMContentLoaded", function() {
    const citationElement = document.getElementById("citation");
    const button = document.getElementById("nouvelleCitation");

    // Fonction pour récupérer une citation aléatoire
    function chargerCitation() {
        fetch("api.php")
            .then(response => response.json())
            .then(data => {
                if (data.citation) {
                    citationElement.innerText = data.citation;
                } else {
                    citationElement.innerText = "Erreur lors du chargement.";
                }
            })
            .catch(error => console.error("Erreur :", error));
    }

    // Charger une citation au démarrage
    chargerCitation();

    // Changer de citation au clic sur le bouton
    button.addEventListener("click", chargerCitation);
});