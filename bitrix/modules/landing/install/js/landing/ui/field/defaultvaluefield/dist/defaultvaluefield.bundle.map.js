{"version":3,"sources":["defaultvaluefield.bundle.js"],"names":["this","BX","Landing","UI","exports","main_core","landing_ui_field_basefield","landing_ui_field_datetimefield","landing_ui_component_internal","ui_draganddrop_draggable","landing_loc","landing_ui_component_listitem","main_core_events","landing_ui_panel_fieldspanel","landing_ui_form_formsettingsform","landing_ui_component_actionpanel","landing_ui_field_variablesfield","_templateObject","DefaultValueField","_BaseField","babelHelpers","inherits","createClass","key","value","isListField","field","Type","isArray","items","options","_this","classCallCheck","possibleConstructorReturn","getPrototypeOf","call","setEventNamespace","subscribeFromOptions","fetchEventsFromOptions","onSelectFieldButtonClick","bind","assertThisInitialized","onItemRemove","onDragEnd","onFormChange","actionPanel","ActionPanel","renderTo","layout","left","id","text","Loc","getMessage","onClick","draggable","Draggable","context","window","parent","container","getListContainer","dragElement","type","MOVE","offset","y","subscribe","forEach","item","itemOptions","prepareItemOptions","concat","entityName","fieldName","addItem","_this2","crmField","getCrmFieldById","displayedValue","fieldItems","getFieldItems","find","currentItem","ID","VALUE","isArrayFilled","Text","toBoolean","isStringFilled","displayedLabel","fieldCategory","getCrmFieldCategoryById","entity_name","caption","CAPTION","cache","remember","Tag","render","taggedTemplateLiteral","createInput","Object","values","crmFields","reduce","acc","category","toConsumableArray","FIELDS","currentField","name","push","ListItem","title","description","editable","removable","appendTo","onRemove","form","createItemForm","getItemById","event","filter","getTarget","emit","skipPrepare","getValue","label","setDescription","_this3","setTimeout","children","map","itemNode","itemNodeId","Dom","attr","_this4","sourceValue","entity_field_name","onFieldsSelect","selectedFields","_this5","fieldId","getAllowedCategories","schemeId","formOptions","document","scheme","dictionary","schemes","String","isPlainObject","Runtime","clone","entities","_this6","preventDefault","FieldsPanel","getInstance","isLeadEnabled","show","allowedCategories","allowedTypes","then","getOriginalCrmFields","deal","categoryId","toNumber","itemsByCategory","_this7","arguments","length","undefined","FormSettingsForm","serializeModifier","valueItem","fields","addField","Field","Dropdown","selector","content","DateTimeField","time","VariablesField","variables","personalizationVariables","BaseField","Ui","Component","DragAndDrop","Event","Panel","Form"],"mappings":"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","file":"defaultvaluefield.bundle.map.js"}