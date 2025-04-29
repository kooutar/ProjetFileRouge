const pathSegments = window.location.pathname.split('/');
const coursId = pathSegments[pathSegments.length - 1];

console.log('ID du cours récupéré :', coursId);

// Joindre le canal Echo
console.log('test');
window.Echo.join(`cours.${coursId}`)
    .here(users => {
        console.log("Connectés :", users);
    })
    .joining(user => {
        console.log(`${user.name} a rejoint le cours`);
    })
    .leaving(user => {
        console.log(`${user.name} a quitté le cours`);
    })
    .listen('.message.envoye', (e) => {
        console.log('Événement message.envoye reçu', e);
        
        // Ajouter le message dans le chat
        const container = document.getElementById('messages');
        const msg = document.createElement('div');
        msg.textContent = `[${e.user.name}] : ${e.message}`;
        container.appendChild(msg);
    });

// Empêcher le rafraîchissement de la page lors de l'envoi du formulaire
const messageForm = document.getElementById('message-form');
const messageInput = document.getElementById('message-input');

messageForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Empêche le rafraîchissement de la page

    const message = messageInput.value;
    console.log('Message envoyé :', message);

    fetch('/envoyer-message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            message: message,
            cours_id: coursId
        })
    })
    .then(response => response.json())  // Récupère la réponse JSON du serveur
    .then(data => {
        console.log('Réponse du serveur:', data);
        
        // Vérifie si le message a été envoyé avec succès
        if (data.status === 'Message envoyé avec succès') {
            // Ajouter le message envoyé dans l'interface utilisateur
            const container = document.getElementById('messages');
            const msg = document.createElement('div');
            msg.textContent = `Vous : ${message}`;
            container.appendChild(msg);

            // Effacer l'input
            messageInput.value = '';
        }
    })
    .catch(error => {
        console.error('Erreur lors de l\'envoi du message:', error);
    });
});
