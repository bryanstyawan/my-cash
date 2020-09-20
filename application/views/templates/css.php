<style>   
    .progress
    {
        display: none;
    }
    /* li a {width: 70%; display: inline-block; word-wrap: break-word;} */
    /* #slide-out:hover
    {
        width: 35%;
    } */

    .picker__header select {
        display: inline-block !important;
        position: inherit!important;
        opacity: inherit;        
        left: inherit;
        height: auto;
        pointer-events: auto;
	}
	
	.btn-table
	{
		margin: 5px;
	}

    .select2-container{
        width: 100% !important;
        background-color: transparent;
        border: none!important;
        border-bottom: 1px solid #9e9e9e !important;
        border-radius: 0;
        outline: none;
        height: 3rem;
        font-size: 1rem;
        margin: 0 0 20px 0;
        padding: 0 !important;
        box-shadow: none;
        box-sizing: content-box;
        /* transition: ; */
    }

    .select2-container--default .select2-selection--single
    {
        padding: 10px 0px 10px;
        border: none;
        margin-top: 5px;        
	}
	
	/* HEAD nestable */
	.dd-list {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	list-style: none;
	}

	.dd-list .dd-list {
	padding-left: 30px;
	}

	.dd-collapsed .dd-list {
	display: none;
	}

	.dd-item,
	.dd-empty,
	.dd-placeholder {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	min-height: 20px;
	font-size: 13px;
	line-height: 20px;
	}

	.dd-handle {
	display: block;
	height: 50px;
	margin: 5px 0;
	padding: 5px 10px;
	color: #333;
	text-decoration: none;
	font-weight: bold;
	border: 1px solid #ccc;
	background: #fafafa;
	background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
	background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
	background: linear-gradient(top, #fafafa 0%, #eee 100%);
	-webkit-border-radius: 3px;
	border-radius: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
		cursor: move;
		margin: 0 0 10px;
		background: #dbdbdb;
	/*    color: #6f6f6f;*/
		padding: 5px 12px
	}

	.dd-handle:hover {
	color: #2ea8e5;
	background: #fff;
	}

	.dd-item > button {
		position: relative;
		cursor: pointer;
		float: left;
		width: 25px;
		height: 50px;
		margin: 0px 10px 10px 0px;
		padding: 0;
		text-indent: 100%;
		white-space: nowrap;
		overflow: hidden;
		border: 0;
		background: #4CAF50;
		font-size: 12px;
		line-height: 1;
		color: #fff;
		text-align: center;
		font-weight: bold;

	}

	.dd-item > button:before {
	content: '+';
	display: block;
	position: absolute;
	width: 100%;
	text-align: center;
	text-indent: 0;
	}

	.dd-item > button[data-action="collapse"]:before {
	content: '-';
	}

	.dd-placeholder,
	.dd-empty {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: #f2fbff;
	border: 1px dashed #b6bcbf;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	}

	.dd-empty {
	border: 1px dashed #bbb;
	min-height: 100px;
	background-color: #e5e5e5;
	background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
		-webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
		-moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
		linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-size: 60px 60px;
	background-position: 0 0, 30px 30px;
	}

	.dd-dragel {
	position: absolute;
	pointer-events: none;
	z-index: 9999;
	}

	.dd-dragel > .dd-item .dd-handle {
	margin-top: 0;
	}

	.dd-dragel .dd-handle {
	-webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
	box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
	}

	/**
	* Nestable Extras
	*/
	.nestable-lists {
	display: block;
	clear: both;
	padding: 30px 0;
	width: 100%;
	border: 0;
	border-top: 2px solid #ddd;
	border-bottom: 2px solid #ddd;
	}

	#nestable-menu {
	padding: 0;
	margin: 20px 0;
	}

	#nestable-output,
	#nestable2-output {
	width: 100%;
	height: 7em;
	font-size: 0.75em;
	line-height: 1.333333em;
	font-family: Consolas, monospace;
	padding: 5px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	}

	#nestable2 .dd-handle {
	color: #fff;
	border: 1px solid #999;
	background: #bbb;
	background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
	background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
	background: linear-gradient(top, #bbb 0%, #999 100%);
	}

	#nestable2 .dd-handle:hover {
	background: #bbb;
	}

	#nestable2 .dd-item > button:before {
	color: #fff;
	}

	.dd + .dd {
	margin-left: 2%;
	}

	.dd-hover > .dd-handle {
	background: #2ea8e5 !important;
	}

	/**
	* Nestable Draggable Handles
	*/
	.dd3-content {
	display: block;
	height: 30px;
	margin: 5px 0;
	padding: 5px 10px 5px 40px;
	color: #333;
	text-decoration: none;
	font-weight: bold;
	border: 1px solid #ccc;
	background: #fafafa;
	background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
	background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
	background: linear-gradient(top, #fafafa 0%, #eee 100%);
	-webkit-border-radius: 3px;
	border-radius: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	}

	.dd3-content:hover {
	color: #2ea8e5;
	background: #fff;
	}

	.dd-dragel > .dd3-item > .dd3-content {
	margin: 0;
	}

	.dd3-item > button {
	margin-left: 30px;
	}

	.dd3-handle {
	position: absolute;
	margin: 0;
	left: 0;
	top: 0;
	cursor: pointer;
	width: 30px;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	border: 1px solid #aaa;
	background: #ddd;
	background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
	background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
	background: linear-gradient(top, #ddd 0%, #bbb 100%);
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
	}

	.dd3-handle:before {
	content: '≡';
	display: block;
	position: absolute;
	left: 0;
	top: 3px;
	width: 100%;
	text-align: center;
	text-indent: 0;
	color: #fff;
	font-size: 20px;
	font-weight: normal;
	}

	.dd3-handle:hover {
	background: #ddd;
	}

	.dd-content > i
	{
		margin: 5px 10px 0px 0px;
	}

	/*
	* Nestable++
	*/

	.dd3-button {
	position: absolute;
	margin: 0;
	right: 0;
	top: 0;
	cursor: pointer;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	}
	.dd3-button:before {
	display: block;
	position: absolute;
	right: 0;
	top: 3px;
	width: 100%;
	text-align: center;
	text-indent: 0;
	color: white;
	font-size: 20px;
	font-weight: normal;
	border-radius: 3px;
	}

	.dd-btn-group
	{
		position: absolute;
		top: 4px;
		margin-left: 101%;
		width: 100%;
	}

	#menu-editor {
	margin-top: 40px;
	}

	#saveButton {
	padding-right: 30px;
	padding-left: 30px;
	}

	.output-container {
	margin-top: 20px;
	}

	#json-output {
	margin-top: 20px;
	}

	.drag_disabled{
		pointer-events: none;
	}

	.drag_enabled{
		pointer-events: all;
	}
	/* END nestable */
	
	/**Template
	 */
	.sidenav li>a:not(.active):hover,
	.sidenav li>a:not(.active):focus 
	{
		background: linear-gradient(45deg,#303f9f,#7b1fa2)!important;
		color:#fff;		
		border-radius: 0 5px 5px 0;		
	}

	/* BTN col12 */
	.btn_margin
	{
		margin: 0 5px 5px 0;
	}

	.peta-jabatan-sidebar {
    /* kanban sidebar */
    box-shadow: -8px 0 18px 0 rgba(25, 42, 70, 0.13);
    width: 15.5rem;
    background-color: white;
    position: fixed;
    -webkit-transform: translateX(110%);
    -ms-transform: translateX(110%);
    transform: translateX(110%);
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    z-index: 1003;
    right: 10px;
    left: auto;
    bottom: 0;
    top: -1px;
    opacity: 0;
  }
  
  .peta-jabatan-sidebar.show {
    opacity: 1;
    -webkit-transform: translateX(9%) translateY(1px);
    -ms-transform: translateX(9%) translateY(1px);
    transform: translateX(9%) translateY(1px);
  }
  
  .peta-jabatan-sidebar .card {
    box-shadow: none;
  }
  
  .peta-jabatan-sidebar .card .card-header {
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
  }
  
  .peta-jabatan-sidebar .card .card-header .close-icon {
    cursor: pointer;
  }
  
  .peta-jabatan-sidebar .card .card-header .close-icon i {
    font-size: 1.2rem;
  }
  
  .peta-jabatan-sidebar .card .card-header .close-icon:focus {
    outline: none;
  }
  
  .peta-jabatan-sidebar .edit-kanban-item .file-field {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
  }
  
  .peta-jabatan-sidebar .edit-kanban-item .file-field .btn-file {
    height: 2rem;
    line-height: 2rem;
  }
  
  .peta-jabatan-sidebar .edit-kanban-item select option {
    font-weight: 700;
    height: 32px;
    width: 50px;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container {
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    padding: 1rem;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-snow, .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-toolbar {
    border: none;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-toolbar .btn {
    width: auto;
    line-height: 0.9;
    padding: 0.467rem 1rem;
    font-size: .8rem;
    color: white;
    margin-left: .8rem;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-toolbar .btn:hover {
    color: White;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-tooltip {
    left: 0 !important;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-tooltip input[type=text] {
    width: 100px;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .ql-editor.ql-blank::before {
    left: 0.3rem;
  }
  
  .peta-jabatan-sidebar .quill-wrapper .ql-editor {
    min-height: 7.93rem;
    padding: 0;
  }
  
  @media (max-width: 420px) {
    .peta-jabatan-sidebar {
      width: 19rem !important;
      right: 1.6rem !important;
    }
    .peta-jabatan-sidebar .quill-wrapper .snow-container .ql-tooltip input[type=text] {
      width: 70px;
    }
  }

.card-sasaran-strategi
{
	height: 200px;;
}

</style>
