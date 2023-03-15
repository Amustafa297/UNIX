let header = `
<label>
<input type="checkbox" style="display:none;">
<span class="myMenu">
    <span class="lines"></span>
</span>
<ul class="myLinks">
    <li>
        <a href='./index.php'>HOME</a>
    </li>
    <li>
        <a href='./whyUnix.html'>WHY UNIX</a>
    </li>
    <div class="dropdown">
        <button class="dropdowner">ABOUT &#x25BD;</button>
        <div class="dropdownees">
            <a href="./history.html">../HISTORY</a>
            <a href="./types.html">../TYPES</a>
            <a href="./installation.html">../INSTALLATION</a>
            <a href="./usage.html">../USAGE</a>
        </div>
    </div>
    <li>
        <a href='./quiz.html'>QUIZ</a>
    </li>
    <div class="dropdown">
        <button class="dropdowner">ADDITIONAL &#x25BD;</button>
        <div class="dropdownees">
            <a href="./references.html">../REFERENCES</a>
            <a href="./thingsDone.html">../THINGS DONE</a>
            <a href="./whoWeAre.html">../WHO WE ARE</a>
        </div>
    </div>
    <li>
        <a href='./chatWithUs.php'>CHAT WITH US</a>
    </li>
</ul>
`;
document.getElementById("header").innerHTML = header;