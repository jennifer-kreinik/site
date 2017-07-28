<?php
include('init.php');
// include('config/init.php');
echo echoHeaderHtml("Research/Resume", "Research and Resumes");
 ?>
<h2> Research
    <h4 class="projects">
        Mental Health and Wellness on Washington University's Campus (2017):
</h4>
        <p class="description">
            I interviewed eight Washington University undergraduate students in hopes to get a better understanding
            of the cultural phenomenon around accessibility and awareness of mental health resources on campus.
            Interviews lasted anywhere from an hour to an hour and a half. Each interview consisted mostly of a
            form of community mapping and an in-depth interview. All interviews were followed by a survey to
            obtain general knowledge information about five different mental health resources offered on campus.
            The mental health resources that I specifically asked about were SHS counseling, Lets Talk, StressBusters,
            Peer Health Educators, and Student Health 101. Overall I have found that while students are familiar with most of the
            resources that Washington Universitys Health and Wellness team have to offer, they do not consider these programs
            mental health resources. Most students consider SHS counseling and Uncle Joes to be the only mental health resources
            on campus suggesting a lack in knowledge about the full extent of all programs that are offered and a barrier in accessing
            these resources. In addition there seems to be a stigma that is associated with mental health on campus. The stigma mostly
            seems to revolve around the high standard that students at Washington University are held to and the need to be perfect. I
            recommend more aggressively targeting informational resources at incoming freshman; bringing mental health into the classroom;
            eliminating the barriers that stand in students way of taking advantage of these resources; and finally
            marketing toward the everyday life problem, not just sever psychological conditions. I believe these recommendations
            will help eliminate the stigma associated with being perfect and increase the accessibility of mental health resources on campus.
    </p>
    <h4 class="projects">
        Coding Fellowship: LessAnnoyingCRM (2017):
</h4>
        <p class="description">
            I spent the summer leraning how to code and created this blog. Below are links to my GitHub and BitBucket (BitBucket
            was used for my CompSci 131 class taken at Washington University Spring Semester 2017):

        <br/>
        <div class = buttons>
            <a href="https://github.com/jennifer-kreinik" class="fa fa-github-alt" aria-hidden="true"></a>
            <a  href="https://jkreinik@bitbucket.org/digshake/cse131-sp17-jkreinik.git" class="fa fa-bitbucket" aria-hidden="true"></a>
        </div>
        </p>


    <h4 class="projects">
        Happy and Neutral Mood Induction on Math and Recall Tests (2016):
</h4>
        <p class="description"> Does ones temporary mood affect the way a person will perform on different types of tasks?
            In our experiment we explored the effect of happy and neutral moods on 2 different task types, math problem
            solving and memory recall. Sixteen Washington University students participated in the study all ranging in age
             from 20-22.  We used a within-groups design, where each participant was shown a series of photos to induce
             either a happy or neutral mood and then required to complete either a memory recall or math task. A Latin-square
              design was used to make sure that every condition was shown in each place of the order. We found a main effect
              of task type, p = .018. Participants performed significantly better on the math task as opposed to the memory
              recall task.  No main effect of mood, p = .37, was seen. An induced happy or neutral mood did not appear to
               cause a difference in performance. We found no interaction between mood and task type, p = .65. Overall our
               findings show that mood does not affect ones performance on different task types.
</h2>
<h2> Resume </h2>
    <ul class="resume" >
    <li >
        <a href = "/blogUserView/Resume-website.pdf" class="fa fa-file-pdf-o" aria-hidden="true" style='font-size:30px' ></a>
            Click here to view my resume
        </li>
    </ul>
<br/>
<?php
    echo echoFooterHtml();
?>
