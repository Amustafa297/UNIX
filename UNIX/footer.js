//let footer = `
//<div style="background-image: url(../media/matrixcodeslow.gif); color: black; margin: 0;">
//<div style="margin: auto; background:black; opacity: 0.8; color: white;">      
//<br/>

//<p style="margin-bottom: 30px;">Project Remarks:</p>

//        <a href="#" class="btn2 foot2">References</a>
//      <a href="#" class="btn2 foot2">Things Done</a>

//<p style="padding-top: 30px;">
//  &copy; Copyright 2022<br/>
// All rights reserved by I AM GROOOP. Powered by Solace.
//</p>
//<br/>
// </div>
// </div>
//`;

let footer = `
<div style="background-color: rgba(245, 245, 245, 0.925); color: black;">
<div style="margin: auto; background-color: rgba(245, 245, 245, 0.925); color: black;">      
<br/>

<p style="margin-bottom: 30px;">Project Remarks:</p>

      <a href="./references.html" class="btn1 foot1">References</a>
      <a href="./thingsDone.html" class="btn1 foot1">Things Done</a>
    
      <p style="padding-top: 30px;">
         &copy; Copyright 2022<br/>
         All rights reserved by I AM GROOOP. Powered by Solace.
      </p>
      <br/>
  </div>
  </div>
`;
document.getElementById("footer").innerHTML = footer;