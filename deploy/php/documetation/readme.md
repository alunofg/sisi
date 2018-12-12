## Auth

### Autenticar   
    url: http://104.131.99.239:5050/oauth/token
    method: POST   
    body:
        {
            "grant_type": "password",   
            "client_id": 2,   
            "client_secret": "g422Ugg1VaW9UcXaqrUKe6hJNb7tETtViB9AtY4X",   
            "username": user_email,   
            "password": user_password,   
            "scope": "*"
        }

## User

### Create User
    url: http://104.131.99.239:5050/api/mobile/users
    method: POST
    header: 
        bearer: Content-Type:application/json
        Accept:application/json
    body:
        {
	        "name": *"string",
	        "cpf": *"string",
	        "birthdate": *"Y-m-d",
	        "gender": *"string",
	        "skin_color": *"string",
	        "cellphone": *"string",
            "phone": "string",
	        "status": *"string",
	        "email": *"string",
		"password": *"string",
        }
        
#### Validações:   
    'name'       => 'required|max:250',
    'cpf'        => 'required|max:14|unique:users,cpf',   
    'birthdate'  => 'required|date',   
    'gender'     => 'required|in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',   
    'skin_color' => 'required|in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',   
    'cellphone'  => 'required|string',   
    'phone'      => 'string',   
    'email'      => 'required|email|max:150|unique:users,email',   
    'password'   => 'required|max:32|string',   
    'status'     => 'required|in:ATIVO,BLOQUEADO,INATIVO',   
    
    
### List Users
    url: http://104.131.99.239:5050/api/mobile/users
    method: GET
    header: 
        bearer: Content-Type:application/json
        Accept:application/json
        Authorization:Bearer {{token}}
	
### Update User
    url: http://104.131.99.239:5050/api/users/{id}
    method: PUT
    header: 
        bearer: Content-Type:application/json
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
        {
		"id": "integer"
	        "name": *"string",
	        "cpf": *"string",
	        "birthdate": *"Y-m-d",
	        "gender": *"string",
	        "skin_color": *"string",
	        "cellphone": *"string",
            "phone": "string",
	        "status": *"string",
	        "email": *"string",
		"password": *"string",
        }
        
#### Validações:   
    'id'	 => 'required|integer',
    'name'       => 'max:250',  
    'cpf'        => 'max:14|unique:users,cpf',   
    'birthdate'  => 'date',   
    'gender'     => 'in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',   
    'skin_color' => 'in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',   
    'cellphone'  => 'string',   
    'phone'      => 'string',   
    'email'      => 'email|max:150|unique:users,email',   
    'password'   => 'max:32|string',   
    'status'     => 'in:ATIVO,BLOQUEADO,INATIVO', 

