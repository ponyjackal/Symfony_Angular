<pre>
> run server, go to BACK folder and run
php bin/console server:start
</pre>
<pre>
URL:/api/user/connect
    Description: Connecte l'utilisateur.
    Type: POST
    Required: firstname, lastname, email
    Required_type: json object
    Return: json object
    
    Exemple required:
    [
        {
            "firstname":"test",
            "lastname":"test",
            "email":"test@epsi.fr"
        }
    ]
    Exemple return: 
    [
        {
            "id": 4,
            "firstname": "test",
            "lastname": "test",
            "email": "test@test.fr",
            "role": 0,
            "active": true,
            "created_at": "2018-04-12T11:36:36+02:00",
            "update_at": "2018-04-12T11:36:36+02:00"
        }
    ]
    
    Actions: 
    
    - Si la personne n'existe pas on la créée (Status 200).
    - Si il manque une clé requise on ne créée pas d'utilisateur (Status 400).
</pre>
<pre>
URL:/user/team/{user_id}
    Description: Retourne toute les teams liés à l'utilisateur.
    Type: GET
    Required: user_id
    Required_type: int
    Return: json object
    
    Exemple return: 
    [
        {
            "id": 1,
            "name": "Projet 1",
            "tokens_credit": 5,
            "active": true,
            "created_at": {
                "date": "2018-04-23 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-10 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        },
        {
            "id": 2,
            "name": "Projet 2",
            "tokens_credit": 5,
            "active": true,
            "created_at": {
                "date": "2018-04-23 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-10 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        }
    ]
    
    Action: 
    
    - Si l'utilisateur n'existe pas ou qu'il n'est pas associé à une team, on ne fait rien (Status 404).
</pre>
<pre>
 
URL:/teams/all
    
    
    Description: Retourne toute les teams.
    Type: GET
    Return: json object
    
    Exemple return: 
    [
        {
            "id": 1,
            "name": "Projet 1",
            "tokens_credit": 5,
            "active": true,
            "created_at": {
                "date": "2018-04-23 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-10 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        },
        {
            "id": 2,
            "name": "Projet 2",
            "tokens_credit": 5,
            "active": true,
            "created_at": {
                "date": "2018-04-23 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-10 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        }
    ]
    
</pre>
<pre>
 
URL:/teams/{team_id}
    
    Description: Retourne une team en fonction de l'id.
    Type: GET
    Required: team_id
    Required_type: int
    Return: json object
    
    Exemple return: 
    [
        {
            "id": 1,
            "name": "Projet 1",
            "tokens_credit": 5,
            "active": true,
            "created_at": {
                "date": "2018-04-23 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-10 18:30:03.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        }
    ]
    
    Action: 
        
    - Si la team n'existe pas on ne fait rien (Status 404).
    
</pre>
<pre>
 
URL:/projects/all
    
    Description: Retourne tout les projects qui sont dans la période actuelle.
    Type: GET
    Return: json object
    
    Exemple return: 
    [
        {
            "id": 1,
            "name": "Projet 2018",
            "description": "Description projet 2018",
            "active": true,
            "created_at": {
                "date": "2018-04-17 00:00:00.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "update_at": {
                "date": "2018-04-19 00:00:00.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "begin_at": {
                "date": "2018-04-01 00:00:00.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            },
            "end_at": {
                "date": "2018-04-30 00:00:00.000000",
                "timezone_type": 3,
                "timezone": "Europe/Berlin"
            }
        },
    ]
    
</pre>
<pre>
URL:/subject/add
    Description: Créé un sujet dans un projet.
    Type: POST
    Required: name, description, created_by, project_id
    Required_type: json object
    Return: json object
    
    Exemple required:
    [
        {
            "name":"test",
            "description":"test",
            "created_by":"1",
            "project_id":"1"
        }
    ]
    Exemple return: 
    [
        {
            "response":true
        }
    ]
    
    Actions: 
  
    - Si la personne n'existe pas on la crée (Status 200).
    - Si l'utilisateur n'existe pas on fait rien (Status 404).
    - Si le nom du sujet dans le projet existe déjà on ne fait rien (Statut 400)
</pre>