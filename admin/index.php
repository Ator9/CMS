<?php
require(__DIR__.'/common/init.php');

$tree = getAdminTree(); // Get module list to build tree panel
foreach($tree as $values) $modules[] = $values['id'];

require(ROOT.'/admin/common/'.$GLOBALS['admin']['header']);
if($GLOBALS['admin']['favicon']!='') { ?><link type="image/x-icon" href="<?php echo $GLOBALS['admin']['favicon']; ?>" rel="shortcut icon" /><?php }
?>
<script>
var LOCAL = <?php echo var_export(LOCAL); ?>;
var EMAIL = "<?php echo $GLOBALS['admin']['data']['email']; ?>";
var HOST  = "<?php echo HOST; ?>";
    
Ext.application({
    name: 'Admin',
    paths: { 'Ext.ux': 'resources/ux', 'ExtCache': 'resources/extjs-cache.php', 'Extensible': 'resources/ux/extensible/src' <?php echo getAdminPaths(); ?> },

    launch: function() {
        Admin = this;
        Admin.modules = <?php echo json_encode($modules); ?>; // Modules list
        Admin.loadedModules = []; // Fills with loaded modules

        Ext.require([ 'ExtCache' ]);

        // Load default module (includes/config_admin.php):
        Admin.firstModule = (location.hash !== '') ? Ext.Array.indexOf(Admin.modules, location.hash.substr(1)) : Ext.Array.indexOf(Admin.modules, '<?php echo $GLOBALS['admin']['default_module']; ?>');
        if(Admin.firstModule === -1) Admin.firstModule = 0;

        // Main items:
        Admin.cards = Ext.create('Ext.panel.Panel', { region: 'center', layout: 'card', margin: '5 0 5 0', border: false } );
        Admin.tree  = Ext.create('Ext.tree.Panel', {
            region: 'west',
            title: '<?php echo ucfirst($lang->t('Modules'));?>',
            width: 160,
            margin: '5 5 5 0',
            collapsible: true, // True to make the panel collapsible and have an expand/collapse toggle Tool added into the header tool button area
            rootVisible: false, // Show root node
            root: { children: <?php echo json_encode(array_values($tree)); ?> },
            <?php echo getAdminFooterBar(); ?> // Footer Bar
            listeners: {
                selectionchange: function(view, record, e) {
                    location.hash = record[0].get('id'); // Set new hash (module dir name)

                    if(Ext.Array.indexOf(Admin.loadedModules, record[0].get('id')) === -1) {
                        Admin.loadedModules[Admin.loadedModules.length] = record[0].get('id');
                        Admin.cards.setLoading(); // Show loading mask before load
                        Admin.cards.add( Ext.create(record[0].get('id')+'.app', { title: record[0].get('text') }) ); // Add card
                        Admin.cards.setLoading(false); // Hide loading mask after load
                    }
                    Admin.cards.layout.setActiveItem( Ext.Array.indexOf(Admin.loadedModules, record[0].get('id')) ); // Activate/Show selected module
                },
                afterrender: function(view, model) {
                    this.getSelectionModel().select(Admin.firstModule); // select firstModule
                }
            }
            <?php if($GLOBALS['admin']['partners_enabled']===true) getAdminPartners(); ?>
        });

        // Translate function:
        Admin.lang = [];
        Admin.lang._ = [];
        for(var i in Admin.modules) Admin.lang[Admin.modules[i]] = [];
        <?php echo getAdminLocale($modules); ?>
        Admin.t = function(key, obj) {
            if(key.indexOf('.') !== -1)
            {
                var module = key.split('.')[0];
                key = key.split('.')[1];
            }
            else if(obj) var module = obj.$className.split('.')[0];

            if(module && key in Admin.lang[module]) return Admin.lang[module][key];
            if(key in Admin.lang._) return Admin.lang._[key];
            return key;
        }

        // Common renderers/functions:
        Admin.getStatusIcon = function(value) { return '<span class="status-'+value+'"></span>'; }; // status-Y/N icons
        Admin.getModulesUrl = function(module) {
            var current_module = (module) ? '/'+module.$className.split('.')[0]+'/admin' : '';
            return '<?php echo MODULES; ?>'+current_module;
        };
        Admin.Msg = function(msg, type) {
            var title = (type) ? 'OK :)' : 'Error :(';
            var icon  = (type) ? Ext.Msg.INFO : Ext.Msg.ERROR;
            Ext.Msg.show({ title: title, msg: msg, buttons: Ext.Msg.OK, icon: icon });
        }
        <?php echo $GLOBALS['admin']['custom_js']; /* Add custom js (includes/config_admin.php) */ ?>

        // Main container:
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [ this.tree, this.cards, {
                title: '<?php echo '<div style="float:left">'.$GLOBALS['admin']['title'].'</div>'.(($aSession->exists('closeBtnTxt')) ? '<div style="float:right">'.htmlentities($aSession->get('closeBtnTxt'), ENT_QUOTES).'</div>' : ''); ?>',
                region: 'north',
                border: false,
                tools: [{ type: 'close', handler: function(event, toolEl, panel) { location.href = 'login.php?logout=1'; } }]
            }]
        });
    }
});

// Check admin session (redirects if necessary):
Ext.Ajax.on('requestexception', function(conn, response, options, eOpts) {
    if(response.status === 401) window.location = 'login.php';
});
    
// Keep Login every 5min:
setInterval(function() {
    Ext.Ajax.request({ url: 'index.php?keep_login=1' });
}, 300000);
</script>
</head>
<body></body>
</html>
