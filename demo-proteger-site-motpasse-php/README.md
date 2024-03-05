# Démonstration de la protection de l'accès à un site web avec l'authentification utilisant un utilisateur et un mot de passe

Protéger un site web avec une authentification basique par mot de passe avec un fichier `.htaccess` et un fichier `.htpasswd`.

> Notez que l'utilisation de ces fichiers est limitée qu'aux serveurs web de type [Apache](https://httpd.apache.org/).

## Le fichier .htpasswd

Le fichier __.htpasswd__ est le fichier que nous utiliserons pour stocker tous les noms d’utilisateur et mots de passe des utilisateurs autorisés à avoir accès au site. Les noms d’utilisateur sont stockés en format texte, où les mots de passe sont [hachés](https://fr.wikipedia.org/wiki/Fonction_de_hachage_cryptographique) à l’aide de l’algorithme [MD5](https://fr.wikipedia.org/wiki/MD5).

Étapes à suivre :

- Créez un fichier __.htpasswd__ dans un répertoire.
- Utilisez un [générateur](https://www.pipeten.com/password/htpassword/) pour produire les informations à ajouter au fichier.
- Entrez la combinaison utilisateur et mot de passe que vous souhaitez utiliser pour accéder à votre site avec dans les champs correspondants.
- Suivez les instructions et copiez la sortie spécifiée et placez-la dans votre fichier `.htpasswd`.
- Enregistrez le fichier une fois que vous avez saisi tous les utilisateurs que vous souhaitez avoir accès au site.

> Notez que la sécurisation de ce fichier n'est pas incluse dans cette démonstration, mais sachez que l'accès à ce fichier devrait être restreint.

## le fichier .htaccess

Étapes à suivre :

- Vous devez créer un fichier __.htaccess__ à l'endroit que vous souhaitez protéger.
- Ajoutez dans le fichier __.htaccess__ le code suivant, en vous assurant de diriger vers le bon fichier __.htpasswd__ à la propriété _AuthUserFile_. Il devrait être au même endroit où votre fichier __.htpasswd__ est situé.
- Enregistrez le fichier après vous être assuré que la configuration est correcte.

```txt
#Protect Directory
AuthName "Dialog prompt"
AuthType Basic
AuthUserFile C:/Bitnami/wampstack/apache2/htdocs/demo-proteger-site-motpasse-php/.htpasswd
Require valid-user
```

Lorsque vous visitez le site "/répertoire" sécurisé, celui-ci doit maintenant être verrouillé derrière une fenêtre d’authentification. Vous devrez saisir le nom d’utilisateur et le mot de passe d’un utilisateur vérifié stocké dans le fichier __.htpasswd__ afin d’obtenir un accès autorisé.

## Comment déterminer la valeur de la propriété `AuthUserFile`

Un des défis est de déterminer la valeur à de la propriété `AuthUserFile`.

Voici une [question](https://stackoverflow.com/questions/6111627/how-to-use-a-relative-path-with-authuserfile-in-htaccess/10449941) sur Stack OverFlow sur le sujet.

> Notez qu'il n'est pas possible d'utiliser les chemins relatifs avec la propriété `AuthUserFile`.

Étapes à suivre :

- Créez un fichier PHP
- Ajoutez le code PHP suivant :

```php
<?php
    echo("Voici le dossier `root` du serveur : " . $_SERVER['DOCUMENT_ROOT']);
?>
```

- Et complétez le chemin selon l'endroit du fichier `.htpasswd`.

## Données de test

Voici les informations à utiliser pour se connecter :

- utilisateur : codewithfrenchy
- mot de passe : pewpew

> Notez que vous aurez fort probablement à changer la valeur de la clé `AuthUserFile` dans le fichier `.htaccess`.

## Références

- <https://www.pipeten.com/support/scripting/protecting-a-directory-using-htaccess-and-htpasswd/>
- <https://help.dreamhost.com/hc/en-us/articles/216363187-Password-protecting-your-site-with-an-htaccess-file>
- <https://www.web2generators.com/apache-tools/htpasswd-generator>
- <https://www.pipeten.com/password/htpassword/>

_Dans le cadre du cours 420-2A4-MT Serveur et données web_

Tous droits réservés 2021 © Alexis Garon-Michaud
