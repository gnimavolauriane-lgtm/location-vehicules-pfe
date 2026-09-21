<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Chat Interface</title>
  <script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="chat.css">
</head>
<body>

  <div id="chat-bouton" class="hidden" title="Ouvrir la boîte de chat">
    <div class="chat-texte">
      <i class="fas fa-comments"></i>
      <span>Avez-vous une question ?</span>
    </div>
    <div class="fermer-chat">×</div>
  </div>

  <div id="chat-box" class="hidden" style="display:none;">
    <div class="chat-entete">
      <div class="entete-gauche">
        <img src="https://i.pravatar.cc/40" class="profil" alt="avatar" />
        <span class='question'>Poser votre question</span>
      </div>
      <div class="fermer-chatBox">×</div>
    </div>
    <div class="chat-corps" id="chat-message">
      <div class="message message-assistant">
        Bonjour 👋 ! Comment puis-je vous aider aujourd’hui ?
      </div>
    </div>
    <div class="chat-footer">
      <input type="text" id="chat-input" placeholder="Écrire un message..." aria-label="Zone de saisie du message">
      <button id="envoyer" title="Envoyer"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const chatBouton = document.getElementById("chat-bouton");
      const chatBox = document.getElementById("chat-box");
      const chatInput = document.getElementById("chat-input");
      const chatMessage = document.getElementById("chat-message");
      const fermerBouton = document.querySelector('.fermer-chat');
      const fermerChatBox = document.querySelector('.fermer-chatBox');

      const reponses = [
        "Je suis là pour vous aider !",
        "Pouvez-vous préciser votre question ?",
        "Merci pour votre message !",
        "Je regarde ça pour vous...",
        "Bonne question, je vais y répondre dans un instant."
      ];

      // Afficher le bouton de chat après 15s
      setTimeout(() => {
        chatBouton.classList.remove("hidden");
        chatBouton.classList.add("chat-retracte"); // Il est rétracté à ce moment-là
        // S'élargir pour afficher le texte après 2 secondes
        setTimeout(() => {
          chatBouton.classList.remove("chat-retracte"); // On élargit
        }, 2000);

        // Revenir en mode rétracté après 2 secondes
        setTimeout(() => {
          chatBouton.classList.add("chat-retracte");
        }, 4000); 
      }, 15000); 

      // Ouverture du chat (sauf si clic sur la croix)
      chatBouton.addEventListener("click", (e) => {
        if (!e.target.classList.contains("fermer-chat")) {
          chatBox.classList.remove("hidden");
          chatBox.style.display = 'flex';
        }
      });

      // Clic sur croix au-dessus du bouton → cache tout
      fermerBouton.addEventListener("click", (e) => {
        e.stopPropagation();
        chatBouton.style.display = 'none';
        chatBox.classList.add('hidden');
        chatBox.style.display = 'none';
      });

      // Clic sur croix dans l'en-tête du chat
      fermerChatBox.addEventListener("click", () => {
        chatBox.classList.add('hidden');
        chatBox.style.display = 'none';
      });

      // Envoi du message
      document.getElementById("envoyer").addEventListener("click", envoyerMessage);
      chatInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") envoyerMessage();
      });

      function envoyerMessage() {
        const messageUtilisateur = chatInput.value.trim();
        if (messageUtilisateur === "") return;

        ajouterMessage("utilisateur", messageUtilisateur);
        chatInput.value = "";

        setTimeout(() => {
          const reponse = reponses[Math.floor(Math.random() * reponses.length)];
          ajouterMessage("message-assistant", reponse);
        }, 800);
      }

      function ajouterMessage(type, text) {
        const msgDiv = document.createElement("div");
        msgDiv.classList.add("message", type);
        msgDiv.textContent = text;
        chatMessage.appendChild(msgDiv);
        chatMessage.scrollTop = chatMessage.scrollHeight;
      }
    });
  </script>
</body>
</html>
