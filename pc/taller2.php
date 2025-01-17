<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornada d'Orientació</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="mainContainer">
        <div id="header">
            <img src="andorra.png" id="andorraBanner">
            <div id="clases">Clases</div>
        </div>
        <div id="inputs">
            <input type="text" id="name" placeholder="Nom...">
            <div id="1er" class="clase">1er</div>
            <div id="2on" class="clase">2on</div>
        </div>
        <div id="activitats">
            <div id="activitat1" class="acts" onclick="selectActivity(this)">
                <span>Activitat 1</span>

                <div id="selectors">
                    <div id="confirmBtn1" class="confirmBtn">Confirma</div>
                    <div class="circle">
                        <div id="circleSected1" class="circleSelected"></div>
                    </div>
                </div>
            </div>
            <div id="activitat2" class="acts" onclick="selectActivity(this)">
                <span>Activitat 2</span>

                <div id="selectors">
                    <div id="confirmBtn2" class="confirmBtn">Confirma</div>
                    <div class="circle">
                        <div id="circleSected2" class="circleSelected"></div>
                    </div>
                </div>
            </div>
            <div id="activitat3" class="acts" onclick="selectActivity(this)">
                <span>Activitat 3</span>
                <div id="selectors">
                    <div id="confirmBtn3" class="confirmBtn">Confirma</div>
                    <div class="circle">
                        <div id="circleSected3" class="circleSelected"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function selectActivity(activityElement) {
                document.querySelectorAll('.acts').forEach(activity => {
                    activity.classList.remove('selected');
                });

                activityElement.classList.add('selected');
                
                document.querySelectorAll('.circle').forEach(circle => {
                    circle.classList.remove('selected');
                });

                activityElement.querySelector('.circle').classList.add('selected');
            }
        </script>

        <script>
            function selectActivity(activityElement) {
                document.querySelectorAll('.acts').forEach(activity => {
                    activity.classList.remove('selected');
                });

                activityElement.classList.add('selected');
                
                document.querySelectorAll('.circle').forEach(circle => {
                    circle.classList.remove('selected');
                });

                activityElement.querySelector('.circle').classList.add('selected');
            }

            document.addEventListener('DOMContentLoaded', function() {
                const confirmButtons = document.querySelectorAll('.confirmBtn');
                confirmButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const name = document.getElementById('name').value;
                        const selectedClass = document.querySelector('.clase.selected');
                        const selectedActivity = document.querySelector('.acts.selected');
                        const taller = 'taller2';

                        if (!name) {
                            alert('Please enter your name.');
                            return;
                        }

                        if (!selectedClass) {
                            alert('Please select a class.');
                            return;
                        }

                        if (!selectedActivity) {
                            alert('Please select an activity.');
                            return;
                        }

                        const classValue = selectedClass.id === '1er' ? '1er' : '2on';
                        const activityValue = selectedActivity.querySelector('span').innerText;

                        fetch('submit.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `name=${encodeURIComponent(name)}&class=${encodeURIComponent(classValue)}&activity=${encodeURIComponent(activityValue)}&taller=${encodeURIComponent(taller)}`
                        })
                        .then(response => response.text())
                        .then(data => {
                            alert(data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                });

                document.querySelectorAll('.clase').forEach(clase => {
                    clase.addEventListener('click', function() {
                        document.querySelectorAll('.clase').forEach(c => c.classList.remove('selected'));
                        clase.classList.add('selected');
                    });
                });
            });
        </script>
        <div id="rightBtn" onclick="location.href='taller3.php'">
            <img id="btnIcon" src="right.svg"/>
        </div>

        <div id="leftBtn" onclick="location.href='index.php'">
            <img id="btnIcon" src="right.svg"/>
        </div>
    </div>
</body>
</html>