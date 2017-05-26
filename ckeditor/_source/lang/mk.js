/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
* @fileOverview
*/

/**#@+
   @type String
   @example
*/

/**
 * Contains the dictionary of language entries.
 * @namespace
 */
CKEDITOR.lang['mk'] =
{
	/**
	 * The language reading direction. Possible values are "rtl" for
	 * Right-To-Left languages (like Arabic) and "ltr" for Left-To-Right
	 * languages (like English).
	 * @default 'ltr'
	 */
	dir : 'ltr', // MISSING

	/*
	 * Screenreader titles. Please note that screenreaders are not always capable
	 * of reading non-English words. So be careful while translating it.
	 */
	editorTitle : 'Богат уредувач на текст, %1, притисни ALТ 0 за помош.',

	// ARIA descriptions.
	toolbars	: 'Editor toolbars', // MISSING
	editor		: 'Rich Text Editor', // MISSING

	// Toolbar buttons without dialogs.
	source			: 'Source', // MISSING
	newPage			: 'New Page', // MISSING
	save			: 'Save', // MISSING
	preview			: 'Preview', // MISSING
	cut				: 'Cut', // MISSING
	copy			: 'Copy', // MISSING
	paste			: 'Paste', // MISSING
	print			: 'Print', // MISSING
	underline		: 'Underline', // MISSING
	bold			: 'Bold', // MISSING
	italic			: 'Italic', // MISSING
	selectAll		: 'Select All', // MISSING
	removeFormat	: 'Remove Format', // MISSING
	strike			: 'Strike Through', // MISSING
	subscript		: 'Subscript', // MISSING
	superscript		: 'Superscript', // MISSING
	horizontalrule	: 'Insert Horizontal Line', // MISSING
	pagebreak		: 'Insert Page Break for Printing', // MISSING
	pagebreakAlt		: 'Page Break', // MISSING
	unlink			: 'Unlink', // MISSING
	undo			: 'Undo', // MISSING
	redo			: 'Redo', // MISSING

	// Common messages and labels.
	common :
	{
		browseServer	: 'Browse Server', // MISSING
		url				: 'URL', // MISSING
		protocol		: 'Protocol', // MISSING
		upload			: 'Upload', // MISSING
		uploadSubmit	: 'Send it to the Server', // MISSING
		image			: 'Image', // MISSING
		flash			: 'Flash', // MISSING
		form			: 'Form', // MISSING
		checkbox		: 'Checkbox', // MISSING
		radio			: 'Radio Button', // MISSING
		textField		: 'Text Field', // MISSING
		textarea		: 'Textarea', // MISSING
		hiddenField		: 'Hidden Field', // MISSING
		button			: 'Button', // MISSING
		select			: 'Selection Field', // MISSING
		imageButton		: 'Image Button', // MISSING
		notSet			: '<not set>', // MISSING
		id				: 'Id', // MISSING
		name			: 'Name', // MISSING
		langDir			: 'Language Direction', // MISSING
		langDirLtr		: 'Left to Right (LTR)', // MISSING
		langDirRtl		: 'Right to Left (RTL)', // MISSING
		langCode		: 'Language Code', // MISSING
		longDescr		: 'Long Description URL', // MISSING
		cssClass		: 'Stylesheet Classes', // MISSING
		advisoryTitle	: 'Advisory Title', // MISSING
		cssStyle		: 'Style', // MISSING
		ok				: 'OK', // MISSING
		cancel			: 'Cancel', // MISSING
		close			: 'Close', // MISSING
		preview			: 'Preview', // MISSING
		generalTab		: 'General', // MISSING
		advancedTab		: 'Advanced', // MISSING
		validateNumberFailed : 'This value is not a number.', // MISSING
		confirmNewPage	: 'Any unsaved changes to this content will be lost. Are you sure you want to load new page?', // MISSING
		confirmCancel	: 'Some of the options have been changed. Are you sure to close the dialog?', // MISSING
		options			: 'Options', // MISSING
		target			: 'Target', // MISSING
		targetNew		: 'New Window (_blank)', // MISSING
		targetTop		: 'Topmost Window (_top)', // MISSING
		targetSelf		: 'Same Window (_self)', // MISSING
		targetParent	: 'Parent Window (_parent)', // MISSING
		langDirLTR		: 'Left to Right (LTR)', // MISSING
		langDirRTL		: 'Right to Left (RTL)', // MISSING
		styles			: 'Style', // MISSING
		cssClasses		: 'Stylesheet Classes', // MISSING
		width			: 'Width', // MISSING
		height			: 'Height', // MISSING
		align			: 'Alignment', // MISSING
		alignLeft		: 'Left', // MISSING
		alignRight		: 'Right', // MISSING
		alignCenter		: 'Center', // MISSING
		alignTop		: 'Top', // MISSING
		alignMiddle		: 'Middle', // MISSING
		alignBottom		: 'Bottom', // MISSING
		invalidHeight	: 'Height must be a number.', // MISSING
		invalidWidth	: 'Width must be a number.', // MISSING
		invalidCssLength	: 'Value specified for the "%1" field must be a positive number with or without a valid CSS measurement unit (px, %, in, cm, mm, em, ex, pt, or pc).', // MISSING
		invalidHtmlLength	: 'Value specified for the "%1" field must be a positive number with or without a valid HTML measurement unit (px or %).', // MISSING
		invalidInlineStyle	: 'Value specified for the inline style must consist of one or more tuples with the format of "name : value", separated by semi-colons.', // MISSING
		cssLengthTooltip	: 'Enter a number for a value in pixels or a number with a valid CSS unit (px, %, in, cm, mm, em, ex, pt, or pc).', // MISSING

		// Put the voice-only part of the label in the span.
		unavailable		: '%1<span class="cke_accessibility">, unavailable</span>' // MISSING
	},

	contextmenu :
	{
		options : 'Context Menu Options' // MISSING
	},

	// Special char dialog.
	specialChar		:
	{
		toolbar		: 'Insert Special Character', // MISSING
		title		: 'Select Special Character', // MISSING
		options : 'Special Character Options' // MISSING
	},

	// Link dialog.
	link :
	{
		toolbar		: 'Link', // MISSING
		other 		: '<other>', // MISSING
		menu		: 'Edit Link', // MISSING
		title		: 'Link', // MISSING
		info		: 'Link Info', // MISSING
		target		: 'Target', // MISSING
		upload		: 'Upload', // MISSING
		advanced	: 'Advanced', // MISSING
		type		: 'Link Type', // MISSING
		toUrl		: 'URL', // MISSING
		toAnchor	: 'Link to anchor in the text', // MISSING
		toEmail		: 'E-mail', // MISSING
		targetFrame		: '<frame>', // MISSING
		targetPopup		: '<popup window>', // MISSING
		targetFrameName	: 'Target Frame Name', // MISSING
		targetPopupName	: 'Popup Window Name', // MISSING
		popupFeatures	: 'Popup Window Features', // MISSING
		popupResizable	: 'Resizable', // MISSING
		popupStatusBar	: 'Status Bar', // MISSING
		popupLocationBar: 'Location Bar', // MISSING
		popupToolbar	: 'Toolbar', // MISSING
		popupMenuBar	: 'Menu Bar', // MISSING
		popupFullScreen	: 'Full Screen (IE)', // MISSING
		popupScrollBars	: 'Scroll Bars', // MISSING
		popupDependent	: 'Dependent (Netscape)', // MISSING
		popupLeft		: 'Left Position', // MISSING
		popupTop		: 'Top Position', // MISSING
		id				: 'Id', // MISSING
		langDir			: 'Language Direction', // MISSING
		langDirLTR		: 'Left to Right (LTR)', // MISSING
		langDirRTL		: 'Right to Left (RTL)', // MISSING
		acccessKey		: 'Access Key', // MISSING
		name			: 'Name', // MISSING
		langCode			: 'Language Code', // MISSING
		tabIndex			: 'Tab Index', // MISSING
		advisoryTitle		: 'Advisory Title', // MISSING
		advisoryContentType	: 'Advisory Content Type', // MISSING
		cssClasses		: 'Stylesheet Classes', // MISSING
		charset			: 'Linked Resource Charset', // MISSING
		styles			: 'Style', // MISSING
		rel			: 'Relationship', // MISSING
		selectAnchor		: 'Select an Anchor', // MISSING
		anchorName		: 'By Anchor Name', // MISSING
		anchorId			: 'By Element Id', // MISSING
		emailAddress		: 'E-Mail Address', // MISSING
		emailSubject		: 'Message Subject', // MISSING
		emailBody		: 'Message Body', // MISSING
		noAnchors		: '(No anchors available in the document)', // MISSING
		noUrl			: 'Please type the link URL', // MISSING
		noEmail			: 'Please type the e-mail address' // MISSING
	},

	// Anchor dialog
	anchor :
	{
		toolbar		: 'Anchor', // MISSING
		menu		: 'Edit Anchor', // MISSING
		title		: 'Anchor Properties', // MISSING
		name		: 'Anchor Name', // MISSING
		errorName	: 'Please type the anchor name', // MISSING
		remove		: 'Remove Anchor' // MISSING
	},

	// List style dialog
	list:
	{
		numberedTitle		: 'Numbered List Properties', // MISSING
		bulletedTitle		: 'Bulleted List Properties', // MISSING
		type				: 'Type', // MISSING
		start				: 'Start', // MISSING
		validateStartNumber				:'List start number must be a whole number.', // MISSING
		circle				: 'Circle', // MISSING
		disc				: 'Disc', // MISSING
		square				: 'Square', // MISSING
		none				: 'None', // MISSING
		notset				: '<not set>', // MISSING
		armenian			: 'Armenian numbering', // MISSING
		georgian			: 'Georgian numbering (an, ban, gan, etc.)', // MISSING
		lowerRoman			: 'Lower Roman (i, ii, iii, iv, v, etc.)', // MISSING
		upperRoman			: 'Upper Roman (I, II, III, IV, V, etc.)', // MISSING
		lowerAlpha			: 'Lower Alpha (a, b, c, d, e, etc.)', // MISSING
		upperAlpha			: 'Upper Alpha (A, B, C, D, E, etc.)', // MISSING
		lowerGreek			: 'Lower Greek (alpha, beta, gamma, etc.)', // MISSING
		decimal				: 'Decimal (1, 2, 3, etc.)', // MISSING
		decimalLeadingZero	: 'Decimal leading zero (01, 02, 03, etc.)' // MISSING
	},

	// Find And Replace Dialog
	findAndReplace :
	{
		title				: 'Find and Replace', // MISSING
		find				: 'Find', // MISSING
		replace				: 'Replace', // MISSING
		findWhat			: 'Find what:', // MISSING
		replaceWith			: 'Replace with:', // MISSING
		notFoundMsg			: 'The specified text was not found.', // MISSING
		findOptions			: 'Find Options', // MISSING
		matchCase			: 'Match case', // MISSING
		matchWord			: 'Match whole word', // MISSING
		matchCyclic			: 'Match cyclic', // MISSING
		replaceAll			: 'Replace All', // MISSING
		replaceSuccessMsg	: '%1 occurrence(s) replaced.' // MISSING
	},

	// Table Dialog
	table :
	{
		toolbar		: 'Table', // MISSING
		title		: 'Table Properties', // MISSING
		menu		: 'Table Properties', // MISSING
		deleteTable	: 'Delete Table', // MISSING
		rows		: 'Rows', // MISSING
		columns		: 'Columns', // MISSING
		border		: 'Border size', // MISSING
		widthPx		: 'pixels', // MISSING
		widthPc		: 'percent', // MISSING
		widthUnit	: 'width unit', // MISSING
		cellSpace	: 'Cell spacing', // MISSING
		cellPad		: 'Cell padding', // MISSING
		caption		: 'Caption', // MISSING
		summary		: 'Summary', // MISSING
		headers		: 'Headers', // MISSING
		headersNone		: 'None', // MISSING
		headersColumn	: 'First column', // MISSING
		headersRow		: 'First Row', // MISSING
		headersBoth		: 'Both', // MISSING
		invalidRows		: 'Number of rows must be a number greater than 0.', // MISSING
		invalidCols		: 'Number of columns must be a number greater than 0.', // MISSING
		invalidBorder	: 'Border size must be a number.', // MISSING
		invalidWidth	: 'Table width must be a number.', // MISSING
		invalidHeight	: 'Table height must be a number.', // MISSING
		invalidCellSpacing	: 'Cell spacing must be a positive number.', // MISSING
		invalidCellPadding	: 'Cell padding must be a positive number.', // MISSING

		cell :
		{
			menu			: 'Cell', // MISSING
			insertBefore	: 'Insert Cell Before', // MISSING
			insertAfter		: 'Insert Cell After', // MISSING
			deleteCell		: 'Delete Cells', // MISSING
			merge			: 'Merge Cells', // MISSING
			mergeRight		: 'Merge Right', // MISSING
			mergeDown		: 'Merge Down', // MISSING
			splitHorizontal	: 'Split Cell Horizontally', // MISSING
			splitVertical	: 'Split Cell Vertically', // MISSING
			title			: 'Cell Properties', // MISSING
			cellType		: 'Cell Type', // MISSING
			rowSpan			: 'Rows Span', // MISSING
			colSpan			: 'Columns Span', // MISSING
			wordWrap		: 'Word Wrap', // MISSING
			hAlign			: 'Horizontal Alignment', // MISSING
			vAlign			: 'Vertical Alignment', // MISSING
			alignBaseline	: 'Baseline', // MISSING
			bgColor			: 'Background Color', // MISSING
			borderColor		: 'Border Color', // MISSING
			data			: 'Data', // MISSING
			header			: 'Header', // MISSING
			yes				: 'Yes', // MISSING
			no				: 'No', // MISSING
			invalidWidth	: 'Cell width must be a number.', // MISSING
			invalidHeight	: 'Cell height must be a number.', // MISSING
			invalidRowSpan	: 'Rows span must be a whole number.', // MISSING
			invalidColSpan	: 'Columns span must be a whole number.', // MISSING
			chooseColor		: 'Choose' // MISSING
		},

		row :
		{
			menu			: 'Row', // MISSING
			insertBefore	: 'Insert Row Before', // MISSING
			insertAfter		: 'Insert Row After', // MISSING
			deleteRow		: 'Delete Rows' // MISSING
		},

		column :
		{
			menu			: 'Column', // MISSING
			insertBefore	: 'Insert Column Before', // MISSING
			insertAfter		: 'Insert Column After', // MISSING
			deleteColumn	: 'Delete Columns' // MISSING
		}
	},

	// Button Dialog.
	button :
	{
		title		: 'Button Properties', // MISSING
		text		: 'Text (Value)', // MISSING
		type		: 'Type', // MISSING
		typeBtn		: 'Button', // MISSING
		typeSbm		: 'Submit', // MISSING
		typeRst		: 'Reset' // MISSING
	},

	// Checkbox and Radio Button Dialogs.
	checkboxAndRadio :
	{
		checkboxTitle : 'Checkbox Properties', // MISSING
		radioTitle	: 'Radio Button Properties', // MISSING
		value		: 'Value', // MISSING
		selected	: 'Selected' // MISSING
	},

	// Form Dialog.
	form :
	{
		title		: 'Form Properties', // MISSING
		menu		: 'Form Properties', // MISSING
		action		: 'Action', // MISSING
		method		: 'Method', // MISSING
		encoding	: 'Encoding' // MISSING
	},

	// Select Field Dialog.
	select :
	{
		title		: 'Selection Field Properties', // MISSING
		selectInfo	: 'Select Info', // MISSING
		opAvail		: 'Available Options', // MISSING
		value		: 'Value', // MISSING
		size		: 'Size', // MISSING
		lines		: 'lines', // MISSING
		chkMulti	: 'Allow multiple selections', // MISSING
		opText		: 'Text', // MISSING
		opValue		: 'Value', // MISSING
		btnAdd		: 'Add', // MISSING
		btnModify	: 'Modify', // MISSING
		btnUp		: 'Up', // MISSING
		btnDown		: 'Down', // MISSING
		btnSetValue : 'Set as selected value', // MISSING
		btnDelete	: 'Delete' // MISSING
	},

	// Textarea Dialog.
	textarea :
	{
		title		: 'Textarea Properties', // MISSING
		cols		: 'Columns', // MISSING
		rows		: 'Rows' // MISSING
	},

	// Text Field Dialog.
	textfield :
	{
		title		: 'Text Field Properties', // MISSING
		name		: 'Name', // MISSING
		value		: 'Value', // MISSING
		charWidth	: 'Character Width', // MISSING
		maxChars	: 'Maximum Characters', // MISSING
		type		: 'Type', // MISSING
		typeText	: 'Text', // MISSING
		typePass	: 'Password' // MISSING
	},

	// Hidden Field Dialog.
	hidden :
	{
		title	: 'Hidden Field Properties', // MISSING
		name	: 'Name', // MISSING
		value	: 'Value' // MISSING
	},

	// Image Dialog.
	image :
	{
		title		: 'Image Properties', // MISSING
		titleButton	: 'Image Button Properties', // MISSING
		menu		: 'Image Properties', // MISSING
		infoTab		: 'Image Info', // MISSING
		btnUpload	: 'Send it to the Server', // MISSING
		upload		: 'Upload', // MISSING
		alt			: 'Alternative Text', // MISSING
		lockRatio	: 'Lock Ratio', // MISSING
		resetSize	: 'Reset Size', // MISSING
		border		: 'Border', // MISSING
		hSpace		: 'HSpace', // MISSING
		vSpace		: 'VSpace', // MISSING
		alertUrl	: 'Please type the image URL', // MISSING
		linkTab		: 'Link', // MISSING
		button2Img	: 'Do you want to transform the selected image button on a simple image?', // MISSING
		img2Button	: 'Do you want to transform the selected image on a image button?', // MISSING
		urlMissing	: 'Image source URL is missing.', // MISSING
		validateBorder	: 'Border must be a whole number.', // MISSING
		validateHSpace	: 'HSpace must be a whole number.', // MISSING
		validateVSpace	: 'VSpace must be a whole number.' // MISSING
	},

	// Flash Dialog
	flash :
	{
		properties		: 'Flash Properties', // MISSING
		propertiesTab	: 'Properties', // MISSING
		title			: 'Flash Properties', // MISSING
		chkPlay			: 'Auto Play', // MISSING
		chkLoop			: 'Loop', // MISSING
		chkMenu			: 'Enable Flash Menu', // MISSING
		chkFull			: 'Allow Fullscreen', // MISSING
 		scale			: 'Scale', // MISSING
		scaleAll		: 'Show all', // MISSING
		scaleNoBorder	: 'No Border', // MISSING
		scaleFit		: 'Exact Fit', // MISSING
		access			: 'Script Access', // MISSING
		accessAlways	: 'Always', // MISSING
		accessSameDomain: 'Same domain', // MISSING
		accessNever		: 'Never', // MISSING
		alignAbsBottom	: 'Abs Bottom', // MISSING
		alignAbsMiddle	: 'Abs Middle', // MISSING
		alignBaseline	: 'Baseline', // MISSING
		alignTextTop	: 'Text Top', // MISSING
		quality			: 'Quality', // MISSING
		qualityBest		: 'Best', // MISSING
		qualityHigh		: 'High', // MISSING
		qualityAutoHigh	: 'Auto High', // MISSING
		qualityMedium	: 'Medium', // MISSING
		qualityAutoLow	: 'Auto Low', // MISSING
		qualityLow		: 'Low', // MISSING
		windowModeWindow: 'Window', // MISSING
		windowModeOpaque: 'Opaque', // MISSING
		windowModeTransparent : 'Transparent', // MISSING
		windowMode		: 'Window mode', // MISSING
		flashvars		: 'Variables for Flash', // MISSING
		bgcolor			: 'Background color', // MISSING
		hSpace			: 'HSpace', // MISSING
		vSpace			: 'VSpace', // MISSING
		validateSrc		: 'URL must not be empty.', // MISSING
		validateHSpace	: 'HSpace must be a number.', // MISSING
		validateVSpace	: 'VSpace must be a number.' // MISSING
	},

	// Speller Pages Dialog
	spellCheck :
	{
		toolbar			: 'Check Spelling', // MISSING
		title			: 'Spell Check', // MISSING
		notAvailable	: 'Sorry, but service is unavailable now.', // MISSING
		errorLoading	: 'Error loading application service host: %s.', // MISSING
		notInDic		: 'Not in dictionary', // MISSING
		changeTo		: 'Change to', // MISSING
		btnIgnore		: 'Ignore', // MISSING
		btnIgnoreAll	: 'Ignore All', // MISSING
		btnReplace		: 'Replace', // MISSING
		btnReplaceAll	: 'Replace All', // MISSING
		btnUndo			: 'Undo', // MISSING
		noSuggestions	: '- No suggestions -', // MISSING
		progress		: 'Spell check in progress...', // MISSING
		noMispell		: 'Spell check complete: No misspellings found', // MISSING
		noChanges		: 'Spell check complete: No words changed', /