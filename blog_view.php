<!doctype html>
<?php include ('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/view_blog.css">
    <link rel="stylesheet" href="css/footer.css">
    <?php

        $random_number = random_int(1,6);
        $imgage_path = "img/blog$random_number.jpg";

    ?>
    <style>
        .blog-header {
            background-image: url(<?php echo $imgage_path ?>);
            background-size: cover;
        }
    </style>
  </head>
  <body>
    <nav>
      <?php include('navbar.php'); ?>
    </nav>
    <main>
        <div class="blog-header">
            <H1>How Physical Activity Boosts Mental Health and Well-Being?</H1>
        </div>
        <div class="container edit-btn">
            <a class="btn btn-success" href="update_blog.php?blog_id=<?php echo $blog['blog_id']; ?>">Edit</a>
            <a class="btn btn-danger" href="action.php?blog_id=<?php echo $blog['blog_id']; ?>">Delete</a>
        </div>
        <div class="blog-content mt-5 mb-5 container">
            <h3>Introduction</h3>
            <p>There’s no denying the fact that exercise is essential for our physical health and mental well-being. Being physically active is crucial for everyone, be it for kids, adults, or elderly individuals. It is a lifesaver that promotes mental health and well-being. Thus, we can say that exercise and mental health are co-related.  

One should not find a specific reason to exercise, it can be done for various purposes, such as recreation, enjoyment, or fitness. It is certainly a lifestyle change that can seriously impact your health and make you physically fit. Let’s talk about exercise and mental health in detail!  </p>
            <h3>Physical Activity and Its Importance </h3>
            <p> In general, physical activity is any kind of movement your body makes that involves muscles while expanding energy. One of the notable things is that physical activity can be done in endless ways and there will be an activity that suits almost every individual. It is always advisable to spend 75-150 minutes on any physical activity, it can be anything, ranging from walking, running, aerobics, cycling, swimming, performing yoga, meditation, to working out in the gym. These can be the activities that boost your heart rate, make you breathe faster and warmer.  </p>
            <h3>Types of Physical Activities for Mental Health Benefits </h3>
            <p>We can categorize physical activities into four parallels, as exercise and mental well-being goes hand in hand. These can be:  

Regular Physical Activity– Any recreational or leisure-time activity, walking or cycling, workplace activities, household chores, games, sports, or even planned workouts in the context of daily life can be incorporated in the regular physical activities. These can be counted on for mental health and fitness.  

Exercise- This aspect includes some of the purposeful activities that can be performed to improve health and mental well-being. These activities can be cycling, jogging, or lifting weights to improve strength. 

Playing- As we know, physical movement is not only essential for adults, but also crucial at every level, be it a child. Playful activities are a type of physical activity that can be done for fun or enjoyment, and mental well-being. Playing can be considered good for both mental health and fitness.  

Sport- The fun, structured, and competitive activities that incorporate sports like football or squash to cricket. These are the types of physical activities that can be played as a part of a team. These physical activities can vary in intensity and involve high-intensity activities, thus perfectly summing up as exercises. </p>
            <h3>How much Physical Activity is Recommended? </h3>
            <p>As we have talked about physical activity, let us tell you how much it is recommended. There is no particular answer to that! Every individual has their recommendation, as per their body.  

There are various studies that suggest that adults should incorporate at least 150 minutes (about 2 and a half hours) of moderate- to intense aerobic physical activity every week. The activities do not have to be non-stop, such as an aerobics class. You can start from 10 minutes or more at a time throughout the day to reach your regular goals.  

Whatever physical activities you pursue in a day, the goal should be to stay active every day, it can exceptionally impact on your mental health and mental well-being. Let us provide you with some tips!  </p>
            <h3>Connection between Physical Health and Mental Health</h3>
            <p>Humans feel better after doing any exercise or physical activity. It can boost our mood, focus, and make us aware. Further, exercise is essential as it helps us to maintain a positive outlook on our life.  

There are many people who think that the link between exercise and mental health is complicated. Let us tell you that the connection between physical health and mental health cannot be overlooked, in fact, inactiveness can be a cause of mental illness. Nonetheless, there are various ways in which exercise can benefit our mental health, such as: </p>
        </div>
    </main>
    </body>
</html>