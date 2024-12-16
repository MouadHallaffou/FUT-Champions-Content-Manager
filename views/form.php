<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Construisez votre équipe FUT Ultimate Team avec une expérience utilisateur interactive et intuitive. Ajoutez, positionnez et modifiez des joueurs selon différentes formations tactiques.">
    <meta name="keywords" content="FUT, Ultimate Team, Football, App, Formation, Joueurs, Gestion, Chimie, Équipe">
    <meta name="author" content="Mouad Hallaffou">
    <link rel="icon" href="">
    <link rel="stylesheet" href="/FUT-Champions-Content-Manager/assets/css/styleForm.css">
    <!-- Lien vers Font Awesome via CDNJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Ultimate Team</title>
  </head>
  <body">
    <div class="formation-section">
        <div class="formation-form" id="playerForm">
            <form action="" id="formulairePlayer">
                <h2 class="titreFormulaire">Ajouter un joueur</h2>
        
                <div class="form-row">
                    <div class="form-group">
                        <label for="formation">Formation:</label>
                        <select id="formation" name="formation" class="form-control">
                            <option value="4-3-3" selected>4-3-3</option>
                            <option value="4-4-2">4-4-2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nom du joueur:</label>
                        <input type="text" id="namePlayer" name="name" value="" class="form-control" placeholder="Entrez le nom du joueur">
                        <span class="erreur-message">*uniquement des caracteres</span>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group">
                        <label for="photo">Photo du joueur:</label>
                        <input type="url" id="photoPlayer" name="photo" class="form-control" placeholder="URL de la photo du joueur">
                        <span class="erreur-message">*L'URL doit commencer par "https://"</span>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationalité:</label>
                        <input type="text" id="nationalityPlayer" name="nationality" class="form-control" placeholder="Entrez la nationalité">
                        <span class="erreur-message">*uniquement des caracteres</span>
                    </div>   
                </div>
        
                <div class="form-row">
                    <div class="form-group">
                        <label for="drapeau">Drapeau:</label>
                        <input type="url" id="drapeauPlayer" name="drapeau" class="form-control" placeholder="URL du drapeau">
                        <span class="erreur-message">*L'URL doit commencer par "https://"</span>
                    </div>
                    <div class="form-group">
                        <label for="club">Club:</label>
                        <input type="text" id="clubPlayer" name="club" class="form-control" placeholder="Entrez le nom du club">
                        <span class="erreur-message">*uniquement des caracteres</span>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group">
                        <label for="logo">logo du club:</label>
                        <input type="url" id="logoPlayer" name="logo" class="form-control" placeholder="URL du logo du club">
                        <span class="erreur-message">*L'URL doit commencer par "https://"</span>
                    </div>
                    <div class="form-group">
                        <label for="rating">Note globale:</label>
                        <input type="number" id="ratingPlayers" name="rating" class="form-control" placeholder="Entrez la Note globale">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <select id="positionPlayer" name="position" class="form-control">
                            <option value="" selected>Selectionner la position du joueur</option>
                            <option value="GK">GK</option>
                            <option value="CBL">CBL</option>
                            <option value="CBR">CBR</option>
                            <option value="LB">LB</option>
                            <option value="RB">RB</option>
                            <option value="CML">CML</option>
                            <option value="CMR">CMR</option>
                            <option value="CM">CM</option>
                            <option value="LW">LW</option>
                            <option value="RW">RW</option>
                            <option value="ST">ST</option>
                        </select>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="pace">Vitesse:</label>
                        <input type="number" id="pacePlayer" name="pace" class="form-control" placeholder="Entrez la vitesse du joueur">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="diving">Plongée:</label>
                        <input type="number" id="divingGK" name="diving" class="form-control" placeholder="Entrez la note de plongée" >
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="shooting">Tir:</label>
                        <input type="number" id="shootingPlayer" name="shooting" class="form-control" placeholder="Entrez la note du tir">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="handling">Manipulation:</label>
                        <input type="number" id="handlingGK" name="handling" class="form-control" placeholder="Entrez la note de manipulation">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="passing">Passes:</label>
                        <input type="number" id="passingPlayer" name="passing" class="form-control" placeholder="Entrez la note des passes">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="kicking">Dégagement:</label>
                        <input type="number" id="kickingGK" name="kicking" class="form-control" placeholder="Entrez la note de dégagement">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="dribbling">Dribbles:</label>
                        <input type="number" id="dribblingPlayer" name="dribbling" class="form-control" placeholder="Entrez la note des dribbles">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="reflexes">Réflexes:</label>
                        <input type="number" id="reflexesGK" name="reflexes" class="form-control" placeholder="Entrez la note des réflexes">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="defending">Défense:</label>
                        <input type="number" id="defendingPlayer" name="defending" class="form-control" placeholder="Entrez la note de défense">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="speed">Vitesse:</label>
                        <input type="number" id="speedGK" name="speed" class="form-control" placeholder="Entrez la vitesse">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group form-group-player" style="display: flex;">
                        <label for="physical">Physique:</label>
                        <input type="number" id="physicalPlayer" name="physical" class="form-control" placeholder="Entrez la note du physique">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                    <div class="form-group-gk" style="display: none;">
                        <label for="positioning">Positionnement:</label>
                        <input type="number" id="positioningGK" name="positioning" class="form-control" placeholder="Entrez la note de positionnement">
                        <span class="erreur-message">*comprise entre 10 et 99</span>
                    </div>
                </div>
                <div class="form-row">
                <div class="button_ajouter">
                <button type="submit" class="btnSubmit" id="btnAjoutPlayer">Enregistre</button>
                </div>
                <div class="button_ajouter">
                    <button type="submit" class="btnSave" id="btnEnregistre" style="display:none;">Enregistre</button>
                </div>
               </div>
            </form>
        </div>   
     </div> 
     <script src="/FUT-Champions-Content-Manager/assets/js/main.js"></script>
    </body>
</html>

