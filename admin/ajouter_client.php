

<form method="post" action="" class="form-style">
    <h2>Ajouter un nouveau client</h2>

    <label>Nom :</label>
    <input type="text" name="nom" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Mot de passe :</label>
    <input type="password" name="motdepasse" required>

    <input type="submit" value="Ajouter">
</form>

<style>
.form-style {
    max-width: 500px;
    margin: 60px auto;
    padding: 40px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2c3e50;
}

.form-style h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 1.8em;
    color: #34495e;
}

.form-style label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.form-style input[type="text"],
.form-style input[type="email"],
.form-style input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1em;
    transition: border-color 0.3s;
}

.form-style input[type="text"]:focus,
.form-style input[type="email"]:focus,
.form-style input[type="password"]:focus {
    border-color: #3498db;
    outline: none;
}

.form-style input[type="submit"] {
    width: 100%;
    background: #27ae60;
    color: white;
    padding: 12px;
    font-size: 1.1em;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-style input[type="submit"]:hover {
    background-color: #1e8449;
}
</style>
