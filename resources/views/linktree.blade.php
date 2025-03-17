<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Baraka Association - Links</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #28a745, #e9f7ef);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container Styles */
        .container {
            text-align: center;
            padding: 50px;
            background: linear-gradient(145deg, #ffffff, #d4edda);
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
            border: 2px solid #28a745;
            margin: 30px;
        }

        .container:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }

        /* Logo Styles */
        .logo {
            max-width: 120px;
            margin-bottom: 20px;
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.2));
            transition: transform 0.3s ease-in-out;
        }

        .logo:hover {
            transform: scale(1.1);
        }

        /* Heading and Paragraph Styles */
        h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            color: #28a745;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
            line-height: 1.6;
        }

        /* Link Button Styles */
        .link {
            display: block;
            margin: 30px;
            padding: 15px 20px;
            background: linear-gradient(145deg, #28a745, #218838);
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(40, 167, 69, 0.2);
        }

        .link:hover {
            background: linear-gradient(145deg, #218838, #1e7e34);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(40, 167, 69, 0.3);
        }

        /* Social Icons Styles */
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            color: #0e7726;
            font-size: 2rem;
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
        }

        .social-icons a:hover {
            color: #218838;
            transform: scale(1.2);
        }

            /* Gallery Styles */
    .gallery {
        margin-top: 40px;
    }

    .gallery h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #28a745;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    .gallery .card {
        background: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 200px; /* Optional: Set a max width for cards */
        aspect-ratio: 1 / 1; /* Ensures the card is always square */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        text-align: center;
    }

    .gallery .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .gallery .card img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image fills the card without distortion */
    }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="{{asset('build/images/logo-sm-dark.png')}}" alt="Global Baraka Association Logo" class="logo">
        <h1>Global Baraka Association</h1>
        <p>The Algerian Baraka Association is a charitable organization committed to providing humanitarian and social support to the most needy segments of society, through projects and initiatives focused on education, health, and sustainable development.</p>
        <div class="social-icons">
            <a href="https://web.facebook.com/albarakaglobal" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/albarakaglobal" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/albarakaglobal/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/albarakaglobal/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.youtube.com/c/elbarakadz" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://t.me/elbarakadz" target="_blank"><i class="fab fa-telegram-plane"></i></a>
        </div>
        <a href="https://albarakaglobal.org/en/donate-now/" class="link">Donate Now</a>
        <div class="gallery">
            <h2>Our Work Gallery</h2>
            <div class="gallery-grid">
                <div class="card">
                    <img src="{{asset('assets/images/work/1.jpg')}}" alt="Work 1">
                </div>
                <div class="card">
                    <img src="{{asset('assets/images/work/2.png')}}" alt="Work 2">
                </div>
                <div class="card">
                    <img src="{{asset('assets/images/work/3.png')}}" alt="Work 3">
                </div>
                <div class="card">
                    <img src="{{asset('assets/images/work/4.jpg')}}" alt="Work 4">
                </div>
                <div class="card">
                    <img src="{{asset('assets/images/work/5.png')}}" alt="Work 5">
                </div>
                <div class="card">
                    <img src="{{asset('assets/images/work/6.jpg')}}" alt="Work 6">
                </div>
            </div>
        </div>
        <a href="https://wa.me/905335721575" class="link">Contact Us</a>

        

        
    </div>
</body>
</html>