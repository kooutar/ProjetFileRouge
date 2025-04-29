// resources/js/chat.js
console.log('test')
let coursId = 42; // À rendre dynamique si besoin
console.log(coursId)
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
        const container = document.getElementById('messages');
        const msg = document.createElement('div');
        msg.textContent = `[${e.user.name}] : ${e.message}`;
        container.appendChild(msg);
    });
