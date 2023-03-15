//* QUIZ
function done(){
    var correctAnswers = 0;
    if(document.getElementById('correct1').checked){
        correctAnswers++;
    }
    if(document.getElementById('correct2').checked){
        correctAnswers++;
    }
    if(document.getElementById('correct3').checked){
        correctAnswers++
    }
    if(document.getElementById('correct4').checked){
        correctAnswers++
    }
    if(document.getElementById('correct5').checked){
        correctAnswers++
    }
    if(document.getElementById('correct6').checked){
        correctAnswers++
    }
    if(document.getElementById('correct7').checked){
        correctAnswers++
    }
    if(document.getElementById('correct8').checked){
        correctAnswers++
    }
    if(document.getElementById('correct9').checked){
        correctAnswers++
    }
    if(document.getElementById('correct10').checked){
        correctAnswers++
    }

    if(correctAnswers <6){
        alert("Your grade is 'F', you have less then 60%");
    }
    else if(correctAnswers == 6 ){
        alert("Your grade is 'D' with " + correctAnswers + " correct answers, that's 60%" );
    }else if(correctAnswers == 7 ){
        alert("Your grade is 'C' with " + correctAnswers + " correct answers, that's 70%" );
    }
    else if(correctAnswers == 8 ){ 
        alert("Your grade is 'B' with " + correctAnswers + " correct answers, that's 80%" );
    }
    else if(correctAnswers == 9 ){
        alert("Your grade is 'A' with " + correctAnswers + " correct answers, that's 90%" );
    }
    else if(correctAnswers == 10 ){
        alert("Your grade is 'A' with " + correctAnswers + " correct answers, that's 100%" );
    }

}

function retry(){
    document.getElementById('correct1').checked = false;
    document.getElementById('correct2').checked = false;
    document.getElementById('correct3').checked = false;
    document.getElementById('correct4').checked = false;
    document.getElementById('correct5').checked = false;
    document.getElementById('correct6').checked = false;
    document.getElementById('correct7').checked = false;
    document.getElementById('correct8').checked = false;
    document.getElementById('correct9').checked = false;
    document.getElementById('correct10').checked = false;
    document.getElementById('retry1').checked = false;
    document.getElementById('retry2').checked = false;
    document.getElementById('retry3').checked = false;
    document.getElementById('retry4').checked = false;
    document.getElementById('retry5').checked = false;
    document.getElementById('retry6').checked = false;
    document.getElementById('retry7').checked = false;
    document.getElementById('retry8').checked = false;
    document.getElementById('retry9').checked = false;
    document.getElementById('retry10').checked = false;
    document.getElementById('retry11').checked = false;
    document.getElementById('retry12').checked = false;
    document.getElementById('retry13').checked = false;
    document.getElementById('retry14').checked = false;
    document.getElementById('retry15').checked = false;
    document.getElementById('retry16').checked = false;
    document.getElementById('retry17').checked = false;
    document.getElementById('retry18').checked = false;
    document.getElementById('retry19').checked = false;
    document.getElementById('retry20').checked = false;
    document.getElementById('retry21').checked = false;
    
}