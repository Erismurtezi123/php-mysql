/* Stilet për faqe */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Stilet për menu */
nav {
    background-color: #333;
    padding: 10px;
}

nav ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

nav ul li a:hover {
    text-decoration: underline;
}

/* Stilet për seksionet */
section {
    padding: 20px;
    margin: 10px;
}

#home {
    background-color: #fff;
    text-align: center;
}

#about, #services, #contact {
    background-color: #fff;
    margin-top: 20px;
}

h1, h2 {
    color: #333;
}

nav ul li a:hover {
    color: #f39c12; /* Ngjyrë portokalli kur kaloni mbi të */
    transition: color 0.3s ease; /* Efekt i butë për ndryshimin e ngjyrës */
}
html {
    scroll-behavior: smooth;
}
#hero {
    height: 100vh;
    background: url('hero-image.jpg') no-repeat center center/cover;
    color: white;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.cta-btn {
    background-color: #3498db;
    padding: 15px 30px;
    color: white;
    text-decoration: none;
    font-size: 18px;
    margin-top: 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-btn:hover {
    background-color: #2980b9;
}
.services-container {
    display: flex;
    justify-content: space-around;
    padding: 40px;
}

.service {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
}

.service i {
    font-size: 50px;
    color: #3498db;
}

.service h3 {
    margin-top: 10px;
    font-size: 22px;
}
#search {
    padding: 10px;
    font-size: 16px;
    width: 300px;
    border: 2px solid #3498db;
    border-radius: 5px;
}
#hero {
    height: 100vh;
    background: url('hero-image.jpg') no-repeat center center/cover;
    color: white;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 0 20px;
}

#hero h1 {
    font-size: 4rem;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 20px;
}

#hero p {
    font-size: 1.5rem;
    margin-bottom: 30px;
}

.cta-btn {
    background-color: #3498db;
    padding: 15px 30px;
    color: white;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-btn:hover {
    background-color: #2980b9;
}
#services {
    background-color: #f8f8f8;
    padding: 50px 20px;
    text-align: center;
}

#services h2 {
    font-size: 3rem;
    color: #333;
    margin-bottom: 40px;
}

.services-container {
    display: flex;
    justify-content: space-around;
    gap: 20px;
    flex-wrap: wrap;
}

.service {
    background-color: #fff;
    padding: 30px;
    width: 300px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service i {
    font-size: 50px;
    color: #3498db;
    margin-bottom: 20px;
}

.service h3 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 15px;
}

.service p {
    color: #555;
}

.service:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}
@media (max-width: 768px) {
    #hero h1 {
        font-size: 3rem;
    }

    #services .services-container {
        flex-direction: column;
    }

    .service {
        width: 80%;
        margin: 10px auto;
    }

    nav ul li {
        margin-right: 15px;
    }
}
