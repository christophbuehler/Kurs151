<div id="interface">
    <nav id="interfaceNav">
        <ul>
            <li><a href="#save">Save</a></li>
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
<div id="resize"></div>
<div id="configurationBox">
    <span>Selected Element</span>
    <section>
        <label>Background</label>
        <ul>
            <li>
                <label>Color</label>
                <div>
                    <input id="backgroundColor" class="noStyle" type="color">
                </div>
            </li>
            <li>
                <label>Image</label>
                <div>
                    <input id="backgroundImage" class="input noStyle" type="file">
                </div>
            </li>
            <li>
                <label>Size</label>
                <div>
                    <input id="backgroundSizeX" class="halfWidth input noStyle" type="text" value="-">
                    <input id="backgroundSizeY" class="halfWidth input noStyle" type="text" value="-">
                </div>
            </li>
            <li>
                <label>Position</label>
                <div>
                    <input id="backgroundPositionX" class="halfWidth input noStyle" type="text" value="-">
                    <input id="backgroundPositionY" class="halfWidth input noStyle" type="text" value="-">
                </div>
            </li>
            <li>
                <label>Repeat</label>
                <div>
                    <select id="backgroundRepeat" class="input noStyle">
                        <option>repeat</option>
                        <option>no-repeat</option>
                        <option>repeat-x</option>
                        <option>repeat-y</option>
                    </select>
                </div>
            </li>
        </ul>
    </section>
    <section>
        <label>Text</label>
        <ul>
        </ul>
    </section>
    <div id="viewSettings">
        <span>View</span>
        <ul>
            <li>
                <label>Grid Size</label>
                <div>
                    <input type="text" value="60" id="gridSize" class="numericInput">
                </div>
            </li>
        </ul>
    </div>
</div>