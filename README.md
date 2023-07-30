<h1 align="center">Welcome to my final rpoject - backen part</h1>

<h1 align="center">PHP-LARAVEL final project in Geekshubs Academy FSD 04-2023</h1>

![headerpict](https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/image.jpg)

<details>
  <summary>Index</summary>
  <ol>
    <li><a href="#about-the-project">About the project</a></li>
    <li><a href="#stack">Stack</a></li>
    <li><a href="#diagram">Diagram</a></li>
    <li><a href="#local-installation">Local installation</a></li>
    <li><a href="#process">Process</a></li>
    <li><a href="#project-structure">Project structure</a></li>
    <li><a href="#endpoints">Endpoints</a></li>
    <li><a href="#future-functionalities">Future functionalities</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#webgraphy">Webgraphy</a></li>
    <li><a href="#gratitudes">Gratitudes</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## About the project

<p align="center">From GeeksHub we were asked to create the backend of my final project. From the creation of the business logic to take it to production. I have chosen a theme related to music, a functional web so that both user and music (besides the admin) can manage it. As a user you will be able to save in your favorites concerts that have caught your attention and book your ticket, plus if you have a group could register it on my website.
As a musician you will have the benefit of being able to promote your concerts through my website, controlling your personal data, band data, your concerts and publish your concerts.
As an admin you will have access to all the management in order to have the best control of the functionality internally. </p>

## Stack
<p>Technologies that has been used:</p>
<div align="center">
    <a href="https://www.postman.com/">
        <img src= "https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white"/>
    </a>
    <a href="https://www.mysql.com/">
        <img src= "https://img.shields.io/badge/mysql-3E6E93?style=for-the-badge&logo=mysql&logoColor=white"/>
    </a>
    <a href="https://www.github.com/">
        <img src= "https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white"/>
    </a>
    <a href="https://git-scm.com/">
        <img src= "https://img.shields.io/badge/git-F54D27?style=for-the-badge&logo=git&logoColor=white"/>
    </a>
    <a href="https://www.docker.com/">
        <img src= "https://img.shields.io/badge/docker-2496ED?style=for-the-badge&logo=docker&logoColor=white"/>
    </a>
    <a href="https://www.php.net/">
        <img src= "https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"/>
    </a>
<a href="https://laravel.com">
        <img src= "https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white"/>
    </a>
</div>

## Diagram

![BBDD](https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/BBDD.png)

## Local installation

Steps to make it work on your local computer:
1. Clone the project on your computer with git bash:
 `$git clone 'url-repository'`
2. Install all dependencies with the following command:
 ` $ compose install `
3. Create a .env file following the template .env.example provided and type all credentials. If you cannot get them, change the parameters for your own local database set up running in docker.
4.  Start the server with:
 ``` $ php artisan serve ```
5. Connect the repository with the database with the following commands:
 ``` $ php artisan migrate ``` 
 ``` $ php artisan db:seed ``` 

6. Import this file in postman to get the endpoints we have created:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/27848105-1592aced-fd09-42ca-83b4-024f0c12ba5e?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D27848105-1592aced-fd09-42ca-83b4-024f0c12ba5e%26entityType%3Dcollection%26workspaceId%3Dc14731dc-3c93-48c6-811b-42a6a726ab8f)


## Process
In order to start the project you had to establish the logic it needs. First I made a sketch of the database tables, to better understand what kind of relationship I will need for each table, where to create the intermediate tables and foreign keys. First I made the web flow, after that I started to create and test (visually) the database tables:

![WEB](https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/flujoWEB.png)

This has allowed me to see what exactly my database needs, what fields and relationships, and to have a good template to start creating it.

![Start](https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/unnamed.jpg)


## Project structure

The project is structured using the Model-View-Controller (MVC) pattern and basic CRUD (Create, Read, Update and Delete) functionality has been implemented. The structure of the project is described below:

- Migrations.
	Migrations are used to define the structure of the tables in the database, including all their columns and types.
- Models.
	Models represent the relationships between the tables in the database and the type of relationship that exists between them. 
- Controllers.
	Two middlewares have been implemented in this web application: one for the administrator role and one for the group role.
- Middlewares.
	This web needed two middlewares: admin and of the group.
- Seeders.
	Seeders have been created, which are example data used to populate the database once the application is running.
- api.
	In the api.php file, all the routes and their relationship to the corresponding controllers and endpoints have been defined.
- .env
	In the .env file all the environment variables that the application needs to run correctly have been defined.

## Endpoints
This project has 32 endpoints. Here are some examples:

User:

<details>
<summary><strong>User</strong></summary>

- Login user:
    - Manage login in the API. The information is passed via body in Postman containing the email and password:

            POST:   https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/login 
        body:
        ``` bash
           {
            "email": "example@example.com",
            "password": "password",
            }
        ```

- Register User: 
    - Manage of the register in our API:

            POST:  https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/register
        body:
        ``` bash
        {
            "firstName": "Name",
            "lastName": "Surname",
            "email": "example@example.com",
            "password": "password",
            "address": "Address",
            "document": "11111111M",
            "dateOfBirth": "00/00/0000",
            "phoneNumber": "111111111",
        }
        ```
    
#### User also can:
    -   Logout
    -   Register Group(if user have a group)
    -   View of Profile
    -   Get My Tickets
    -   Delete profile
    -   Book ticket
    -   Put in favorites
    -   Get my favorites
</details>

<details>

#### General endpoints:

<summary><strong>General</strong></summary>

Without login you can:
    -   View of all groups
    -   View of all concerts
    -   Search concerts by title or group name
    -   View of Conctacts page
    -   View of About Us page

</details>

<details>

#### User(as musician):
<summary><strong>Musician</strong></summary>

- Create concert: 
    - Musician can public his concert in the web.
  
            POST:   https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/createConcert
        body:
        ``` bash
        {
            "image": "URL",
            "title": "Title",
            "date": "0000/00/00 00:00",
            "groupName": "Name",
            "description": "Description",
            "programm": "Programm",
        }
        ```
    
Also can:

    -   Get my concerts
    -   Get my group
    -   Update my group
    
</details>


<details>

#### Admin part:
<summary><strong>Admin</strong></summary>

- Get all users:  
            GET:   https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/users
	
- Get user by name or surname: 
    - Obtains information faster. 
  
            GET:   https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/user?lastName=&firstName=
	
- Update group: 
    - Update only some information.
  
            PUT:   https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/user?lastName=&firstName=/api/groups/admin/8
	body:
        ``` bash
        {
   	        "description": "Description"
        }

        ```
	
- Delete Concert: 
    - Deletes concert by it´s id.
  
            DELETE:    https://ak-fsd-backend-concert-to-you-njjo.vercel.app/api/api/concert/delete/16


Also admin can:

    -   Restore & Delete user
    -   Restore & Delete concert
    -   Restore & Delete Group

</details>

## Future functionalities

As future features I would like to develop the user interface in more depth, having more options for managing personal data, in addition to the collaborations and to be able to introduce real sale of tickets, are some examples of the general idea.     

## License
This project is belonging to license Creative Commons Legal Code.

## Webgraphy
To achieve the goal we have collected information from:
-	[PHP Documentation](https://www.php.net/manual/es/intro-whatis.php)
-	[Laravel Documentation](https://laravel.com/docs/10.x)


## Gratitudes
I thank my teachers for their time dedicated to this project:

- ***Dani***  
<a href="https://github.com/Datata" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=blue" target="_blank"></a> 

- ***Jose***  
<a href="https://www.github.com/JoseMarin" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=red" target="_blank"></a>

- ***David***  
<a href="https://www.github.com/Dave86dev" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>

- ***Mara***  
<a href="https://www.github.com/MaraScampini" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a> 

## Contact
#### ｛ Anastasia Kosovets  ｝
<a href = "mailto:anastasiakosovets@gmail.com"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://www.linkedin.com/in/anastasia-kosovets-00022917b/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a> 
</p>