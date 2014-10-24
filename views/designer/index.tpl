<div id="openDialogueBox">
    <div id="openDialogue">
        <span>Recent documents:</span>
        <div id="recentClassDiagrams"></div>
        <form id="newDiagramForm">
            <div class="success" id="createDiagramSuccess"></div>
            <div class="error" id="createDiagramError"></div>
            <input name="diagramName" type="text" id="diagramName" class="input" placeholder="name">
        </form>
        <button id="newDiagram" class="btn">create new class diagram</button>
    </div>
</div>
<div id="interface">
    <nav id="interfaceNav">
        <ul>
            <li><a href="$save">Save</a></li>
            <li><a href="#restore">Restore</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="logout">Logout</a></li>
        </ul>
        <a href="#" id="close">close</a>
    </nav>
</div>
<div id="pageContainer"></div>
<div id="contextMenu">
    <nav>
        <ul>
            <li><a href="$newBlock">New Class</a></li>
            <li><a id="delBlock" href="$deleteBlock">Delete Class</a></li>
            <li><a id="copyBlock" href="$copyBlock">Copy Class</a></li>
            <li><a id="insertBlock" href="$insertBlock">Insert Class</a></li>
            <li><a href="#nav">Page Settings</a></li>
            <li><a id="showGridBtn" href="$showGrid">Show Grid</a></li>
        </ul>
    </nav>
</div>
<div id="configurationBox">
    <label>Grid Size</label>
    <div>
        <input type="text" value="60" id="gridSize" class="numericInput">
        <button class="btn">new connection</button>
    </div>
</div>