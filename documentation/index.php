<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>UX CMS - Documentation</title>
<link rel="stylesheet" type="text/css" href="documentation.css" />
</head>
<body id="top">
<div id="header"><h1>UX <span class="myadmin">CMS</span></h1></div>

<!-- TOP MENU -->
<ul class="header">
    <li><a href="#top">Top</a></li>
    <li><a href="#require">Requirements</a></li>
    <li><a href="#intro">Introduction</a></li>
    <li><a href="#setup">Installation</a></li>
    <li><a href="#setup_script">Setup script</a></li>
    <li><a href="#config">Configuration</a></li>
    <li><a href="#transformations">Transformations</a></li>
    <li><a href="#faq"><abbr title="Frequently Asked Questions"> FAQ</abbr></a></li>
    <li><a href="#developers">Developers</a></li>
    <li><a href="#copyright">Copyright</a></li>
    <li><a href="#credits">Credits</a></li>
    <li><a href="#glossary">Glossary</a></li>
</ul>

<div id="body">

<ul><li><a href="http://www.phpmyadmin.net/">
            phpMyAdmin homepage</a></li>
    <li><a href="https://sourceforge.net/projects/phpmyadmin/">
            SourceForge phpMyAdmin project page</a></li>
    <li><a href="http://wiki.phpmyadmin.net">
            Official phpMyAdmin wiki</a></li>
    <li><a href="https://github.com/phpmyadmin">
            Git repositories on Github</a></li>
    <li>Local documents:
        <ul><li>Version history: <a href="changelog.php">ChangeLog</a></li>
            <li>License: <a href="license.php">LICENSE</a></li>
        </ul>
    </li>
</ul>

<!-- REQUIREMENTS -->
<h2 id="require">Requirements</h2>

<ul><li><b>PHP</b>
        <ul><li>You need PHP 5.2.0 or newer, with <tt>session</tt> support
                (<a href="#faq1_31">see
            <abbr title="Frequently Asked Questions">FAQ</abbr> 1.31</a>)
        , the Standard PHP Library (SPL) extension and JSON support.
                </li>
        <li>To support uploading of ZIP files, you need the PHP <tt>zip</tt> extension.</li>
        <li>For proper support of multibyte strings (eg. UTF-8, which is
            currently the default), you should install the mbstring and ctype
            extensions.
        </li>
            <li>You need GD2 support in PHP to display inline
                thumbnails of JPEGs (&quot;image/jpeg: inline&quot;) with their
                original aspect ratio</li>
            <li>When using the &quot;cookie&quot;
                <a href="#authentication_modes">authentication method</a>, the
                <a href="http://www.php.net/mcrypt"><tt>mcrypt</tt></a> extension
                is strongly suggested for most users and is <b>required</b> for
                64&#8211;bit machines. Not using mcrypt will cause phpMyAdmin to
                load pages significantly slower.
                </li>
                <li>To support upload progress bars, see <a href="#faq2_9">
                    <abbr title="Frequently Asked Questions">FAQ</abbr> 2.9</a>.</li>
                <li>To support BLOB streaming, see PHP and MySQL requirements
                in <a href="#faq6_25">
                    <abbr title="Frequently Asked Questions">FAQ</abbr> 6.25</a>.</li>
                <li>To support XML and Open Document Spreadsheet importing,
                you need PHP 5.2.17 or newer and the 
                <a href="http://www.php.net/libxml"><tt>libxml</tt></a> extension.</li>
        </ul>
    </li>
    <li><b>MySQL</b> 5.0 or newer (<a href="#faq1_17">details</a>);</li>
    <li><b>Web browser</b> with cookies enabled.</li>
</ul>

<!-- INTRODUCTION -->
<h2 id="intro">Introduction</h2>

<p> phpMyAdmin can manage a whole MySQL server (needs a super-user) as well as
    a single database. To accomplish the latter you'll need a properly set up
    MySQL user who can read/write only the desired database. It's up to you to
    look up the appropriate part in the MySQL manual.
</p>

<h3>Currently phpMyAdmin can:</h3>

<ul><li>browse and drop databases, tables, views, columns and indexes</li>
    <li>create, copy, drop, rename and alter databases, tables, columns and
        indexes</li>
    <li>maintenance server, databases and tables, with proposals on server
        configuration</li>
    <li>execute, edit and bookmark any
        <abbr title="structured query language">SQL</abbr>-statement, even
        batch-queries</li>
    <li>load text files into tables</li>
    <li>create<a href="#footnote_1"><sup>1</sup></a> and read dumps of tables
        </li>
    <li>export<a href="#footnote_1"><sup>1</sup></a> data to various formats:
        <abbr title="Comma Separated Values">CSV</abbr>,
    <abbr title="Extensible Markup Language">XML</abbr>,
    <abbr title="Portable Document Format">PDF</abbr>,
    <abbr title="International Standards Organisation">ISO</abbr>/<abbr
    title="International Electrotechnical Commission">IEC</abbr> 26300 -
    OpenDocument Text and Spreadsheet,
    <abbr title="Microsoft Word 2000">Word</abbr>,
    and L<sup>A</sup>T<sub><big>E</big></sub>X formats
        </li>
    <li>import data and MySQL structures from OpenDocument spreadsheets, as well as <abbr title="Extensible Markup Language">XML</abbr>, <abbr title="Comma Separated Values">CSV</abbr>, and <abbr title="Server Query Language">SQL</abbr> files</li>
    <li>administer multiple servers</li>
    <li>manage MySQL users and privileges</li>
    <li>check referential integrity in MyISAM tables</li>
    <li>using Query-by-example (QBE), create complex queries automatically
        connecting required tables</li>
    <li>create <abbr title="Portable Document Format">PDF</abbr> graphics of
        your Database layout</li>
    <li>search globally in a database or a subset of it</li>
    <li>transform stored data into any format using a set of predefined
        functions, like displaying BLOB-data as image or download-link
        </li>
    <li>track changes on databases, tables and views</li>
    <li>support InnoDB tables and foreign keys <a href="#faq3_6">(see
        <abbr title="Frequently Asked Questions">FAQ</abbr> 3.6)</a></li>
    <li>support mysqli, the improved MySQL extension <a href="#faq1_17">
        (see <abbr title="Frequently Asked Questions">FAQ</abbr> 1.17)</a></li>
    <li>create, edit, call, export and drop stored procedures and functions</li>
    <li>create, edit, export and drop events and triggers</li>
    <li>communicate in <a href="http://www.phpmyadmin.net/home_page/translations.php">62 different languages</a>
        </li>
    <li>synchronize two databases residing on the same as well as remote servers
        <a href="#faq9_1">(see <abbr title="Frequently Asked Questions">FAQ</abbr> 9.1)</a>
    </li>

</ul>

<h4>A word about users:</h4>
<p> Many people have difficulty
    understanding the concept of user management with regards to phpMyAdmin. When
    a user logs in to phpMyAdmin, that username and password are passed directly
    to MySQL. phpMyAdmin does no account management on its own (other than
    allowing one to manipulate the MySQL user account information); all users
    must be valid MySQL users.</p>

<p class="footnote" id="footnote_1">
    <sup>1)</sup> phpMyAdmin can compress (Zip, GZip -RFC 1952- or Bzip2 formats)
    dumps and <abbr title="comma separated values">CSV</abbr> exports if you use
    PHP with Zlib support (<tt>--with-zlib</tt>) and/or Bzip2 support
    (<tt>--with-bz2</tt>). Proper support may also need changes in
    <tt>php.ini</tt>.</p>

<!-- INSTALLATION -->
<h2 id="setup">Installation</h2>

<ol><li><a href="#quick_install">Quick Install</a></li>
    <li><a href="#setup_script">Setup script usage</a></li>
    <li><a href="#linked-tables">phpMyAdmin configuration storage</a></li>
    <li><a href="#upgrading">Upgrading from an older version</a></li>
    <li><a href="#authentication_modes">Using authentication modes</a></li>
</ol>

<p class="important">
    phpMyAdmin does not apply any special security methods to the MySQL database
    server. It is still the system administrator's job to grant permissions on
    the MySQL databases properly. phpMyAdmin's &quot;Privileges&quot; page can
    be used for this.
</p>

<p class="important">
    Warning for <acronym title="Apple Macintosh">Mac</acronym> users:<br />
    if you are on a <acronym title="Apple Macintosh">Mac</acronym>
    <abbr title="operating system">OS</abbr> version before
    <abbr title="operating system">OS</abbr> X, StuffIt unstuffs with
    <acronym title="Apple Macintosh">Mac</acronym> formats.<br />
    So you'll have to resave as in BBEdit to Unix style ALL phpMyAdmin scripts
    before uploading them to your server, as PHP seems not to like
    <acronym title="Apple Macintosh">Mac</acronym>-style end of lines character
    (&quot;<tt>\r</tt>&quot;).</p>

<h3 id="quick_install">Quick Install</h3>
<ol><li>Choose an appropriate distribution kit from the phpmyadmin.net
    Downloads page. Some kits contain only the English messages,
    others contain all languages in UTF-8 format (this should be fine
    in most situations), others contain all
    languages and all character sets. We'll assume you chose a kit whose
    name looks like <tt>phpMyAdmin-x.x.x-all-languages.tar.gz</tt>.
    </li>
    <li>Untar or unzip the distribution (be sure to unzip the subdirectories):
        <tt>tar -xzvf phpMyAdmin_x.x.x-all-languages.tar.gz</tt> in your webserver's
        document root. If you don't have direct access to your document root,
        put the files in a directory on your local machine, and, after step 4,
        transfer the directory on your web server using, for example, ftp.</li>
    <li>Ensure that all the scripts have the appropriate owner (if PHP is
        running in safe mode, having some scripts with an owner different
        from the owner of other scripts will be a
        problem). See <a href="#faq4_2">
        <abbr title="Frequently Asked Questions">FAQ</abbr> 4.2</a> and
        <a href="#faq1_26"><abbr title="Frequently Asked Questions">FAQ</abbr>
        1.26</a> for suggestions.</li>
    <li>Now you must configure your installation. There are two methods that
        can be used. Traditionally, users have hand-edited a copy of
    <tt>config.inc.php</tt>, but now a wizard-style setup script is
    provided for those who prefer a graphical installation. Creating a
    <tt>config.inc.php</tt> is still a quick way to get started and needed for some advanced features.
        <ul><li>To manually create the file, simply use your text editor to
                create the file <tt>config.inc.php</tt> (you can copy
                <tt>config.sample.inc.php</tt> to get minimal configuration
                file) in the main (top-level) phpMyAdmin directory (the one
                that contains <tt>index.php</tt>).  phpMyAdmin first loads
                <tt>libraries/config.default.php</tt> and then overrides those
                values with anything found in <tt>config.inc.php</tt>. If the
                default value is okay for a particular setting, there is no
                need to include it in <tt>config.inc.php</tt>.  You'll need a
                few directives to get going, a simple configuration may look
                like this:
<pre>
&lt;?php
$cfg['blowfish_secret'] = 'ba17c1ec07d65003';  // use here a value of your choice

$i=0;
$i++;
$cfg['Servers'][$i]['auth_type']     = 'cookie';
?&gt;
</pre>
                Or, if you prefer to not be prompted every time you log in:
<pre>
&lt;?php

$i=0;
$i++;
$cfg['Servers'][$i]['user']          = 'root';
$cfg['Servers'][$i]['password']      = 'cbb74bc'; // use here your password
$cfg['Servers'][$i]['auth_type']     = 'config';
?&gt;
</pre>
                For a full explanation of possible configuration values, see the
                <a href="#config">Configuration Section</a> of this document.</li>
            <li id="setup_script">Instead of manually editing
                <tt>config.inc.php</tt>, you can use the
                <a href="setup/">Setup Script</a>. First you must
                manually create a folder <tt>config</tt> in the phpMyAdmin
                directory. This is a security measure. On a Linux/Unix system you
                can use the following commands:
<pre>
cd phpMyAdmin
mkdir config                        # create directory for saving
chmod o+rw config                   # give it world writable permissions
</pre>
                And to edit an existing configuration, copy it over first:
<pre>
cp config.inc.php config/           # copy current configuration for editing
chmod o+w config/config.inc.php     # give it world writable permissions
</pre>
                On other platforms, simply create the folder and ensure that your
                web server has read and write access to it. <a href="#faq1_26">FAQ
                1.26</a> can help with this.<br /><br />

                Next, open <tt><a href="setup/">setup/</a>
                </tt>in your browser. Note that <strong>changes are not saved to
                disk until explicitly choose <tt>Save</tt></strong> from the
                <i>Configuration</i> area of the screen. Normally the script saves
                the new config.inc.php to the <tt>config/</tt> directory, but if
                the webserver does not have the proper permissions you may see the
                error "Cannot load or save configuration." Ensure that the <tt>
                config/</tt> directory exists and has the proper permissions -
                or use the <tt>Download</tt> link to save the config file locally
                and upload (via FTP or some similar means) to the proper location.<br /><br />

                Once the file has been saved, it must be moved out of the <tt>
                config/</tt> directory and the permissions must be reset, again
                as a security measure:
<pre>
mv config/config.inc.php .         # move file to current directory
chmod o-rw config.inc.php          # remove world read and write permissions
rm -rf config                      # remove not needed directory
</pre>
                Now the file is ready to be used. You can choose to review or edit
                the file with your favorite editor, if you prefer to set some
                advanced options which the setup script does not provide.</li></ul></li>
    <li>If you are using the
        <tt>auth_type</tt> &quot;config&quot;, it is suggested that you
        protect the phpMyAdmin installation directory because using
        config does not require a user to
        enter a password to access the phpMyAdmin installation. Use of an alternate
        authentication method is recommended, for example with
        HTTP&#8211;AUTH in a <a href="#glossary"><i>.htaccess</i></a> file or switch to using
        <tt>auth_type</tt> cookie or http. See the
        <a href="#faqmultiuser"> multi&#8211;user sub&#8211;section</a> of this
        <abbr title="Frequently Asked Questions">FAQ</abbr> for additional
        information, especially <a href="#faq4_4">
        <abbr title="Frequently Asked Questions">FAQ</abbr> 4.4</a>.</li>
    <li>Open the <a href="index.php">main phpMyAdmin directory</a>
        in your browser. phpMyAdmin should now display a welcome screen
        and your databases, or a login dialog if using
        <abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie
        authentication mode.</li>
    <li>You should deny access to the <tt>./libraries</tt> and
        <tt>./setup/lib</tt> subfolders in your webserver configuration. For
        Apache you can use supplied <a href="#glossary"><i>.htaccess</i></a> file in that folder, for other
        webservers, you should configure this yourself.  Such configuration
        prevents from possible path exposure and cross side scripting
        vulnerabilities that might happen to be found in that code.</li>
    <li>
        It is generally good idea to protect public phpMyAdmin installation
        against access by robots as they usually can not do anything good
        there. You can do this using <code>robots.txt</code> file in root of
        your webserver or limit access by web server configuration, see 
        <a href="#faq1_42"><abbr title="Frequently Asked Questions">FAQ</abbr> 1.42</a>.
    </li>
</ol>

<h3 id="linked-tables">phpMyAdmin configuration storage</h3>

<p> For a whole set of new features (bookmarks, comments,
    <abbr title="structured query language">SQL</abbr>-history,
    tracking mechanism,
    <abbr title="Portable Document Format">PDF</abbr>-generation, column contents
    transformation, etc.) you need to create a set of special tables. Those
    tables can be located in your own database, or in a central database for a
    multi-user installation (this database would then be accessed by the
    controluser, so no other user should have rights to it).</p>

<p> Please look at your <tt>./examples/</tt> directory, where you should find a
    file called <i>create_tables.sql</i>. (If you are using a Windows server, pay
    special attention to <a href="#faq1_23">
    <abbr title="Frequently Asked Questions">FAQ</abbr> 1.23</a>).</p>

<p> If you already had this infrastructure and upgraded to MySQL 4.1.2
    or newer, please use <i>./examples/upgrade_tables_mysql_4_1_2+.sql</i>
    and then create new tables by importing <i>./examples/create_tables.sql</i>.</p>

<p> You can use your phpMyAdmin to create the tables for you. Please be aware
    that you may need special (administrator) privileges to create the database
    and tables, and that the script may need some tuning, depending on the
    database name.</p>

<p> After having imported the <i>./examples/create_tables.sql</i> file, you
    should specify the table names in your <i>./config.inc.php</i> file. The
    directives used for that can be found in the <a href="#config">Configuration
    section</a>. You will also need to have a controluser with the proper rights
    to those tables (see section <a href="#authentication_modes">Using
    authentication modes</a> below).</p>

<h3 id="upgrading">Upgrading from an older version</h3>

<p> Simply copy <i>./config.inc.php</i> from your previous installation into the newly
    unpacked one. Configuration files from old versions may
    require some tweaking as some options have been changed or removed; in
    particular, the definition of <tt>$cfg['AttributeTypes']</tt> has changed
    so you better remove it from your file and just use the default one.
    For compatibility with PHP 6, remove a <tt>set_magic_quotes_runtime(0);</tt>
    statement that you might find near the end of your configuration file.</p>

<p> You should <strong>not</strong> copy <tt>libraries/config.default.php</tt>
    over <tt>config.inc.php</tt> because the default configuration file
    is version-specific.</p>

<p> If you have upgraded your MySQL server from a version previous to 4.1.2 to
    version 5.x or newer and if you use the phpMyAdmin configuration storage,
    you should run the <abbr title="structured query language">SQL</abbr> script
    found in <tt>examples/upgrade_tables_mysql_4_1_2+.sql</tt>.</p>

<h3 id="authentication_modes">Using authentication modes</h3>

<ul><li><abbr title="HyperText Transfer Protocol">HTTP</abbr> and cookie
        authentication modes are recommended in a <b>multi-user environment</b>
        where you want to give users access to their own database and don't want
        them to play around with others.<br />
        Nevertheless be aware that MS Internet Explorer seems to be really buggy
        about cookies, at least till version 6.<br />
        Even in a <b>single-user environment</b>, you might prefer to use
        <abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie mode so
        that your user/password pair are not in clear in the configuration file.
        </li>

    <li><abbr title="HyperText Transfer Protocol">HTTP</abbr> and cookie
        authentication modes are more secure: the MySQL login information does
        not need to be set in the phpMyAdmin configuration file (except possibly
        for the <a href="#controluser">controluser</a>).<br />
        However, keep in mind that the password travels in plain text, unless
        you are using the HTTPS protocol.<br />
        In cookie mode, the password is stored, encrypted with the blowfish
        algorithm, in a temporary cookie.</li>

    <li id="pmausr">Note: this section is only applicable if
        your MySQL server is running with <tt>--skip-show-database</tt>.<br /><br />

        For '<abbr title="HyperText Transfer Protocol">HTTP</abbr>' and 'cookie'
        modes, phpMyAdmin needs a controluser that has <b>only</b> the
        <tt>SELECT</tt> privilege on the <i>`mysql`.`user` (all columns except
        `Password`)</i>, <i>`mysql`.`db` (all columns)</i>, <i>`mysql`.`host`
        (all columns)</i> and <i>`mysql`.`tables_priv` (all columns except
        `Grantor` and `Timestamp`)</i> tables.<br /> You must specify the details
        for the <a href="#controluser">controluser</a> in the <tt>config.inc.php</tt>
        file under the
        <tt><a href="#cfg_Servers_controluser" class="configrule">
            $cfg['Servers'][$i]['controluser']</a></tt> and
        <tt><a href="#cfg_Servers_controlpass" class="configrule">
            $cfg['Servers'][$i]['controlpass']</a></tt> settings.<br />
        The following example assumes you want to use <tt>pma</tt> as the
        controluser and <tt>pmapass</tt> as the controlpass, but <b>this is
        only an example: use something else in your file!</b> Input these
        statements from the phpMyAdmin <abbr title="structured query language">SQL
        </abbr> Query window or mysql command&#8211;line client.<br />
        Of course you have to replace <tt>localhost</tt> with the webserver's host
        if it's not the same as the MySQL server's one.

        <pre>
GRANT USAGE ON mysql.* TO 'pma'@'localhost' IDENTIFIED BY 'pmapass';
GRANT SELECT (
    Host, User, Select_priv, Insert_priv, Update_priv, Delete_priv,
    Create_priv, Drop_priv, Reload_priv, Shutdown_priv, Process_priv,
    File_priv, Grant_priv, References_priv, Index_priv, Alter_priv,
    Show_db_priv, Super_priv, Create_tmp_table_priv, Lock_tables_priv,
    Execute_priv, Repl_slave_priv, Repl_client_priv
    ) ON mysql.user TO 'pma'@'localhost';
GRANT SELECT ON mysql.db TO 'pma'@'localhost';
GRANT SELECT ON mysql.host TO 'pma'@'localhost';
GRANT SELECT (Host, Db, User, Table_name, Table_priv, Column_priv)
    ON mysql.tables_priv TO 'pma'@'localhost';</pre>

        If you want to use the many new relation and bookmark features:

        <pre>
GRANT SELECT, INSERT, UPDATE, DELETE ON &lt;pma_db&gt;.* TO 'pma'@'localhost';
</pre>

        (this of course requires that your <a href="#linked-tables">phpMyAdmin
        configuration storage</a> be set up).  
    <br /></li>

    <li>Then each of the <i>true</i> users should be granted a set of privileges
        on a set of particular databases. Normally you shouldn't give global
        privileges to an ordinary user, unless you understand the impact of those
        privileges (for example, you are creating a superuser).<br />
        For example, to grant the user <i>real_user</i> with all privileges on
        the database <i>user_base</i>:<br />

        <pre>
GRANT ALL PRIVILEGES ON user_base.* TO 'real_user'@localhost IDENTIFIED BY 'real_password';
</pre>

        What the user may now do is controlled entirely by the MySQL user
        management system.<br />
        With <abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie
        authentication mode, you don't need to fill the user/password fields
        inside the <a href="#cfg_Servers" class="configrule">$cfg['Servers']</a>
        array.</li>
</ul>

<h4>'<abbr title="HyperText Transfer Protocol">HTTP</abbr>' authentication mode</h4>

<ul><li>Uses <abbr title="HyperText Transfer Protocol">HTTP</abbr> Basic authentication
        method and allows you to log in as any valid MySQL user.</li>
    <li>Is supported with most PHP configurations. For
        <abbr title="Internet Information Services">IIS</abbr>
        (<abbr title="Internet Server Application Programming Interface">ISAPI</abbr>)
        support using <abbr title="Common Gateway Interface">CGI</abbr> PHP see
        <a href="#faq1_32"><abbr title="Frequently Asked Questions">FAQ</abbr>
        1.32</a>, for using with Apache
        <abbr title="Common Gateway Interface">CGI</abbr> see
        <a href="#faq1_35"><abbr title="Frequently Asked Questions">FAQ</abbr>
        1.35</a>.</li>
    <li>See also <a href="#faq4_4">
        <abbr title="Frequently Asked Questions">FAQ</abbr> 4.4</a> about not
        using the <a href="#glossary"><i>.htaccess</i></a> mechanism along with
        '<abbr title="HyperText Transfer Protocol">HTTP</abbr>' authentication
        mode.</li>
</ul>

<h4>'cookie' authentication mode</h4>

<ul><li>You can use this method as a replacement for the
        <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication
        (for example, if you're running
        <abbr title="Internet Information Services">IIS</abbr>).</li>
    <li>Obviously, the user must enable cookies in the browser, but this is
    now a requirement for all authentication modes.</li>
    <li>With this mode, the user can truly log out of phpMyAdmin and log in back
        with the same username.</li>
    <li>If you want to log in to arbitrary server see
        <a href="#AllowArbitraryServer" class="configrule">
        $cfg['AllowArbitraryServer']</a> directive.</li>
    <li>As mentioned in the <a href="#require">requirements</a> section, having
        the <tt>mcrypt</tt> extension will speed up access considerably, but is
        not required.</li>
</ul>

<h4>'signon' authentication mode</h4>

<ul><li>This mode is a convenient way of using credentials from another
    application to authenticate to phpMyAdmin.</li>
    <li>The other application has to store login information into
    session data.</li>
    <li>More details in the <a href="#cfg_Servers_auth_type">auth_type</a>
    section.</li>
</ul>
<h4>'config' authentication mode</h4>

<ul><li>This mode is the less secure one because it requires you to fill the
        <a href="#servers_user" class="configrule">
        $cfg['Servers'][$i]['user']</a> and
        <a href="#servers_user" class="configrule">
        $cfg['Servers'][$i]['password']</a> fields (and as a result, anyone who
        can read your config.inc.php can discover your username and password).
        <br />
        But you don't need to setup a &quot;controluser&quot; here: using the
        <a href="#servers_only_db" class="configrule">
        $cfg['Servers'][$i]['only_db']</a> might be enough.</li>
    <li>In the <a href="#faqmultiuser">
        <abbr title="Internet service provider">ISP</abbr>
        <abbr title="Frequently Asked Questions">FAQ</abbr></a> section, there
        is an entry explaining how to protect your configuration file.</li>
    <li>For additional security in this mode, you may wish to consider the Host
        authentication
        <a href="#servers_allowdeny_order" class="configrule">
            $cfg['Servers'][$i]['AllowDeny']['order']</a> and
        <a href="#servers_allowdeny_rules" class="configrule">
            $cfg['Servers'][$i]['AllowDeny']['rules']</a> configuration
        directives.</li>
    <li>Unlike cookie and http, does not require a user to log in when first
        loading the phpMyAdmin site. This is by design but could allow any
        user to access your installation. Use of some restriction method is
        suggested, perhaps a <a href="#glossary"><i>.htaccess</i></a> file with the
        HTTP-AUTH directive or disallowing incoming HTTP requests at
        one&#8217;s router or firewall will suffice (both of which
        are beyond the scope of this manual but easily searchable with Google).</li>
</ul>
<h4 id="swekey">Swekey authentication</h4>
<p>
The Swekey is a low cost authentication USB key that can be used in
web applications.<br /><br />
When Swekey authentication is activated, phpMyAdmin requires the
users's Swekey to be plugged before entering the login page (currently
supported for cookie authentication mode only). Swekey Authentication is 
disabled by default.<br /><br />
To enable it, add the following line to <tt>config.inc.php</tt>:
</p>
<pre>
$cfg['Servers'][$i]['auth_swekey_config'] = '/etc/swekey.conf';
</pre>
<p>
You then have to create the <tt>swekey.conf</tt> file that will associate
each user with their Swekey Id. It is important to place this file outside
of your web server's document root (in the example, it is located in <tt>/etc</tt>). A self documented sample file is provided 
in the <tt>examples</tt> directory. Feel free to use it with your own 
users' information.<br /><br />
If you want to purchase a Swekey please visit
<a href="http://phpmyadmin.net/auth_key">http://phpmyadmin.net/auth_key</a>
since this link provides funding for phpMyAdmin.
</p>
<!-- CONFIGURATION -->
<h2 id="config">Configuration</h2>

<p> <span class="important">Warning for <acronym title="Apple Macintosh">Mac</acronym>
    users:</span> PHP does not seem to like
    <acronym title="Apple Macintosh">Mac</acronym> end of lines character
    (&quot;<tt>\r</tt>&quot;). So ensure you choose the option that allows to use
    the *nix end of line character (&quot;<tt>\n</tt>&quot;) in your text editor
    before saving a script you have modified.</p>

<p> <span class="important">Configuration note:</span>
    Almost all configurable data is placed in <tt>config.inc.php</tt>. If this file
    does not exist, please refer to the <a href="#setup">Quick install</a>
    section to create one. This file only needs to contain the parameters you want to
    change from their corresponding default value in
    <tt>libraries/config.default.php</tt>.</p>

<p> The parameters which relate to design (like colors) are placed in
    <tt>themes/themename/layout.inc.php</tt>. You might also want to create
    <i>config.footer.inc.php</i> and <i>config.header.inc.php</i> files to add
    your site specific code to be included on start and end of each page.</p>

<dl><dt id="cfg_PmaAbsoluteUri">$cfg['PmaAbsoluteUri'] string</dt>
    <dd>Sets here the complete <abbr title="Uniform Resource Locator">URL</abbr>
        (with full path) to your phpMyAdmin installation's directory.
        E.g. <tt>http://www.your_web.net/path_to_your_phpMyAdmin_directory/</tt>.
        Note also that the <abbr title="Uniform Resource Locator">URL</abbr> on
        some web servers are case&#8211;sensitive.
        Don&#8217;t forget the trailing slash at the end.<br /><br />

        Starting with version 2.3.0, it is advisable to try leaving this
        blank. In most cases phpMyAdmin automatically detects the proper
        setting. Users of port forwarding will need to set PmaAbsoluteUri (<a
        href="https://sourceforge.net/tracker/index.php?func=detail&amp;aid=1340187&amp;group_id=23067&amp;atid=377409">more info</a>).
        A good test is to browse a table, edit a row and save it. There should
        be an error message if phpMyAdmin is having trouble auto&#8211;detecting
        the correct value. If you get an error that this must be set or if
        the autodetect code fails to detect your path, please post a bug
        report on our bug tracker so we can improve the code.</dd>

    <dt id="cfg_PmaNoRelation_DisableWarning">$cfg['PmaNoRelation_DisableWarning'] boolean</dt>
    <dd>Starting with version 2.3.0 phpMyAdmin offers a lot of features to work
        with master / foreign &#8211; tables (see
        <a href="#pmadb" class="configrule">$cfg['Servers'][$i]['pmadb']</a>).
        <br />
        If you tried to set this up and it does not work for you, have a look on
        the &quot;Structure&quot; page of one database where you would like to
        use it. You will find a link that will analyze why those features have
        been disabled.<br />
        If you do not want to use those features set this variable to
        <tt>TRUE</tt> to stop this message from appearing.</dd>

    <dt id="cfg_SuhosinDisableWarning">$cfg['SuhosinDisableWarning'] boolean</dt>
    <dd>A warning is displayed on the main page if Suhosin is detected.
    You can set this parameter to <tt>TRUE</tt> to stop this message 
    from appearing.</dd>

    <dt id="cfg_McryptDisableWarning">$cfg['McryptDisableWarning'] boolean</dt>
    <dd>Disable the default warning that is displayed if mcrypt is missing for
    cookie authentication.
    You can set this parameter to <tt>TRUE</tt> to stop this message 
    from appearing.</dd>

    <dt id="cfg_TranslationWarningThreshold">$cfg['TranslationWarningThreshold'] integer</dt>
    <dd>Show warning about incomplete translations on certain threshold.</dd>

    <dt id="cfg_AllowThirdPartyFraming">$cfg['AllowThirdPartyFraming'] boolean</dt>
    <dd>Setting this to <tt>true</tt> allows a page located on a different
    domain to call phpMyAdmin inside a frame, and is a potential security
    hole allowing cross-frame scripting attacks.</dd>

    <dt id="cfg_blowfish_secret">$cfg['blowfish_secret'] string</dt>
    <dd>The &quot;cookie&quot; auth_type uses blowfish
        algorithm to encrypt the password.<br />
        If you are using the &quot;cookie&quot; auth_type, enter here a random
        passphrase of your choice. It will be used internally by the blowfish
        algorithm: you won&#8217;t be prompted for this passphrase. There is
        no maximum length for this secret.<br /><br />
        
        Since version 3.1.0 phpMyAdmin can generate this on the fly, but it
        makes a bit weaker security as this generated secret is stored in
        session and furthermore it makes impossible to recall user name from 
        cookie.</dd>

    <dt id="cfg_Servers">$cfg['Servers'] array</dt>
    <dd>Since version 1.4.2, phpMyAdmin supports the administration of multiple
        MySQL servers. Therefore, a
        <a href="#cfg_Servers" class="configrule">$cfg['Servers']</a>-array has
        been added which contains the login information for the different servers.
        The first
        <a href="#cfg_Servers_host" class="configrule">$cfg['Servers'][$i]['host']</a>
        contains the hostname of the first server, the second
        <a href="#cfg_Servers_host" class="configrule">$cfg['Servers'][$i]['host']</a>
        the hostname of the second server, etc. In
        <tt>./libraries/config.default.php</tt>, there is only one section for
        server definition, however you can put as many as you need in
        <tt>./config.inc.php</tt>, copy that block or needed parts (you don't
        have to define all settings, just those you need to change).</dd>

    <dt id="cfg_Servers_host">$cfg['Servers'][$i]['host'] string</dt>
    <dd>The hostname or <abbr title="Internet Protocol">IP</abbr> address of your
        $i-th MySQL-server. E.g. localhost.</dd>

    <dt id="cfg_Servers_port">$cfg['Servers'][$i]['port'] string</dt>
    <dd>The port-number of your $i-th MySQL-server. Default is 3306 (leave
        blank). If you use &quot;localhost&quot; as the hostname, MySQL
        ignores this port number and connects with the socket, so if you want
        to connect to a port different from the default port, use
        &quot;127.0.0.1&quot; or the real hostname in
        <a href="#cfg_Servers_host" class="configrule">$cfg['Servers'][$i]['host']</a>.
    </dd>

    <dt id="cfg_Servers_socket">$cfg['Servers'][$i]['socket'] string</dt>
    <dd>The path to the socket to use. Leave blank for default.<br />
        To determine the correct socket, check your MySQL configuration or, using the
        <tt>mysql</tt> command&#8211;line client, issue the <tt>status</tt> command.
        Among the resulting information displayed will be the socket used.</dd>

    <dt id="cfg_Servers_ssl">$cfg['Servers'][$i]['ssl'] boolean</dt>
    <dd>Whether to enable SSL for connection to MySQL server.
    </dd>

    <dt id="cfg_Servers_connect_type">$cfg['Servers'][$i]['connect_type'] string</dt>
    <dd>What type connection to use with the MySQL server. Your options are
        <tt>'socket'</tt> and <tt>'tcp'</tt>. It defaults to 'tcp' as that
        is nearly guaranteed to be available on all MySQL servers, while
        sockets are not supported on some platforms.<br /><br />

        To use the socket mode, your MySQL server must be on the same machine
        as the Web server.</dd>

    <dt id="cfg_Servers_extension">$cfg['Servers'][$i]['extension'] string</dt>
    <dd>What php MySQL extension to use for the connection. Valid options are:
        <br /><br />

        <tt><i>mysql</i></tt> :
        The classic MySQL extension.<br /><br />

        <tt><i>mysqli</i></tt> :
        The improved MySQL extension. This extension became available
        with PHP 5.0.0 and is the recommended way to connect to a server
        running MySQL 4.1.x or newer.</dd>

    <dt id="cfg_Servers_compress">$cfg['Servers'][$i]['compress'] boolean</dt>
    <dd>Whether to use a compressed protocol for the MySQL server connection
        or not (experimental).</dd>

    <dt id="controlhost">
        <span id="cfg_Servers_controlhost">$cfg['Servers'][$i]['controlhost']</span> string<br />
    </dt>
    <dd>Permits to use an alternate host to hold the configuration storage
    data.</dd>

    <dt id="controluser">
        <span id="cfg_Servers_controluser">$cfg['Servers'][$i]['controluser']</span> string<br />
        <span id="cfg_Servers_controlpass">$cfg['Servers'][$i]['controlpass']</span> string
    </dt>
    <dd>This special account is used for 2 distinct purposes: to make possible
        all relational features (see
        <a href="#pmadb" class="configrule">$cfg['Servers'][$i]['pmadb']</a>)
        and, for a MySQL server running with
        <tt>--skip-show-database</tt>, to enable a multi-user installation
        (<abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie
        authentication mode).<br /><br />

        When using <abbr title="HyperText Transfer Protocol">HTTP</abbr> or
        cookie authentication modes (or 'config'
        authentication mode since phpMyAdmin 2.2.1), you need to supply the
        details of a MySQL account that has <tt>SELECT</tt> privilege on the
        <i>mysql.user (all columns except &quot;Password&quot;)</i>,
        <i>mysql.db (all columns)</i> and <i>mysql.tables_priv (all columns
        except &quot;Grantor&quot; and &quot;Timestamp&quot;) </i>tables.
        This account is used to check what databases the user will see at
        login.<br />
        Please see the <a href="#setup">install section</a> on
        &quot;Using authentication modes&quot; for more information.<br /><br />

        In phpMyAdmin versions before 2.2.5, those were called
        &quot;stduser/stdpass&quot;.</dd>

    <dt id="cfg_Servers_auth_type">$cfg['Servers'][$i]['auth_type'] string
        <tt>['<abbr title="HyperText Transfer Protocol">HTTP</abbr>'|'http'|'cookie'|'config'|'signon']</tt></dt>
    <dd>Whether config or cookie or
        <abbr title="HyperText Transfer Protocol">HTTP</abbr> or signon authentication
        should be used for this server.
        <ul><li>'config' authentication (<tt>$auth_type&nbsp;=&nbsp;'config'</tt>)
                is the plain old way: username and password are stored in
                <i>config.inc.php</i>.</li>
            <li>'cookie' authentication mode
                (<tt>$auth_type&nbsp;=&nbsp;'cookie'</tt>) as introduced in
                2.2.3 allows you to log in as any valid MySQL user with the
                help of cookies. Username and password are stored in
                cookies during the session and password is deleted when it
                ends. This can also allow you to log in in arbitrary server if
                <tt><a href="#AllowArbitraryServer" class="configrule">$cfg['AllowArbitraryServer']</a></tt> enabled.
            </li>
            <li>'<abbr title="HyperText Transfer Protocol">HTTP</abbr>' authentication (was called 'advanced' in previous versions and can be written also as 'http')
                (<tt>$auth_type&nbsp;=&nbsp;'<abbr title="HyperText Transfer Protocol">HTTP</abbr>'</tt>) as introduced in 1.3.0
                allows you to log in as any valid MySQL user via HTTP-Auth.</li>
            <li>'signon' authentication mode
                (<tt>$auth_type&nbsp;=&nbsp;'signon'</tt>)
                as introduced in 2.10.0 allows you to log in from prepared PHP
                session data or using supplied PHP script. This is useful for implementing single signon
                from another application.
                
                Sample way how to seed session is in signon example: <code>examples/signon.php</code>. 
                There is also alternative example using OpenID - <code>examples/openid.php</code> and 
                example for scripts based solution - <code>examples/signon-script.php</code>.
                
                You need to
                configure <a href="#cfg_Servers_SignonSession"
                class="configrule">session name</a> or <a href="#cfg_Servers_SignonScript"
                class="configrule">script to be executed</a> and <a
                href="#cfg_Servers_SignonURL" class="configrule">signon
                <abbr title="Uniform Resource Locator">URL</abbr></a> to use
                this authentication method.</li>
        </ul>

        Please see the <a href="#setup">install section</a> on &quot;Using authentication modes&quot;
        for more information.
    </dd>
    <dt id="servers_auth_http_realm">
    <span id="cfg_Servers_auth_http_realm">$cfg['Servers'][$i]['auth_http_realm']</span> string<br />
    </dt>
    <dd>
    When using auth_type = '<abbr title="HyperText Transfer Protocol">HTTP</abbr>', this field allows to define a custom
   <abbr title="HyperText Transfer Protocol">HTTP</abbr> Basic Auth Realm which will be displayed to the user. If not explicitly
    specified in your configuration, a string combined of "phpMyAdmin " and either
    <a href="#cfg_Servers_verbose" class="configrule">$cfg['Servers'][$i]['verbose']</a>
    or <a href="#cfg_Servers_host" class="configrule">$cfg['Servers'][$i]['host']</a> will be used.
    </dd>
    <dt id="servers_auth_swekey_config">
    <span id="cfg_Servers_auth_swekey_config">$cfg['Servers'][$i]['auth_swekey_config']</span> string<br />
    </dt>
    <dd>
    The name of the file containing <a href="#swekey">Swekey</a> ids and login 
    names for hardware authentication. Leave empty to deactivate this feature.
    </dd>
    <dt id="servers_user">
        <span id="cfg_Servers_user">$cfg['Servers'][$i]['user']</span> string<br />
        <span id="cfg_Servers_password">$cfg['Servers'][$i]['password']</span> string
    </dt>
    <dd>
        When using auth_type = 'config', this is the user/password-pair
        which phpMyAdmin will use to connect to the
        MySQL server. This user/password pair is not needed when <abbr title="HyperText Transfer Protocol">HTTP</abbr> or
        cookie authentication is used and should be empty.</dd>
    <dt id="servers_nopassword">
        <span
        id="cfg_Servers_nopassword">$cfg['Servers'][$i]['nopassword']</span> boolean
    </dt>
    <dd>
        Allow attempt to log in without password when a login with password
        fails. This can be used together with http authentication, when
        authentication is done some other way and phpMyAdmin gets user name
        from auth and uses empty password for connecting to MySQL. Password
        login is still tried first, but as fallback, no password method is
        tried.</dd>
    <dt id="servers_only_db">
        <span id="cfg_Servers_only_db">$cfg['Servers'][$i]['only_db']</span> string or array
    </dt>
    <dd>
        If set to a (an array of) database name(s), only this (these) database(s)
        will be shown to the user. Since phpMyAdmin 2.2.1, this/these
        database(s) name(s) may contain MySQL wildcards characters
        (&quot;_&quot; and &quot;%&quot;): if you want to use literal instances
        of these characters, escape them (I.E. use <tt>'my\_db'</tt> and not
        <tt>'my_db'</tt>).<br />
        This setting is an efficient way to lower the server load since the
        latter does not need to send MySQL requests to build the available
        database list. But <span class="important">it does not replace the
        privileges rules of the MySQL database server</span>. If set, it just
        means only these databases will be displayed but
        <span class="important">not that all other databases can't be used.</span>
        <br /><br />

        An example of using more that one database:
        <tt>$cfg['Servers'][$i]['only_db'] = array('db1', 'db2');</tt>
        <br /><br />

        As of phpMyAdmin 2.5.5 the order inside the array is used for sorting the
        databases in the left frame, so that you can individually arrange your databases.<br />
        If you want to have certain databases at the top, but don't care about the others, you do not
        need to specify all other databases. Use:
        <tt>$cfg['Servers'][$i]['only_db'] = array('db3', 'db4', '*');</tt>
        instead to tell phpMyAdmin that it should display db3 and db4 on top, and the rest in alphabetic
        order.</dd>

    <dt><span id="cfg_Servers_hide_db">$cfg['Servers'][$i]['hide_db']</span> string
    </dt>
    <dd>Regular expression for hiding some databases from unprivileged users. 
        This only hides them
        from listing, but a user is still able to access them (using, for example,
        the SQL query area). To limit access, use the MySQL privilege system.
        <br /><br />
        For example, to hide all databases starting with the letter &#34;a&#34;, use<br />
        <pre>$cfg['Servers'][$i]['hide_db'] = '^a';</pre>
        and to hide both &#34;db1&#34; and &#34;db2&#34; use <br />
        <pre>$cfg['Servers'][$i]['hide_db'] = '^(db1|db2)$';</pre>
        More information on regular expressions can be found in the
        <a href="http://php.net/manual/en/reference.pcre.pattern.syntax.php">
        PCRE pattern syntax</a> portion of the PHP reference manual.
        </dd>

    <dt id="cfg_Servers_verbose">$cfg['Servers'][$i]['verbose'] string</dt>
    <dd>Only useful when using phpMyAdmin with multiple server entries. If set,
        this string will be displayed instead of the hostname in the pull-down
        menu on the main page. This can be useful if you want to show only
    certain databases on your system, for example. For HTTP auth, all
    non-US-ASCII characters will be stripped.</dd>

    <dt id="pmadb">
        <span id="cfg_Servers_pmadb">$cfg['Servers'][$i]['pmadb']</span> string
    </dt>
    <dd>The name of the database containing the phpMyAdmin configuration storage.
        <br /><br />

        See the <a href="#linked-tables">phpMyAdmin configuration storage</a>
        section in this document to see the benefits of this feature,
        and for a quick way of creating this database and the needed tables.
        <br /><br />

        If you are the only user of this phpMyAdmin installation, you can
        use your current database to store those special tables; in this
        case, just put your current database name in
        <tt>$cfg['Servers'][$i]['pmadb']</tt>. For a multi-user installation,
        set this parameter to the name of your central database containing
        the phpMyAdmin configuration storage.</dd>

    <dt id="bookmark">
        <span id="cfg_Servers_bookmarktable">$cfg['Servers'][$i]['bookmarktable']</span> string
    </dt>
    <dd>Since release 2.2.0 phpMyAdmin allows users to bookmark queries. This can be
        useful for queries you often run.<br /><br />

        To allow the usage of this functionality:
        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>enter the table name in
                <tt>$cfg['Servers'][$i]['bookmarktable']</tt></li>
        </ul>
    </dd>

    <dt id="relation">
        <span id="cfg_Servers_relation">$cfg['Servers'][$i]['relation']</span> string
    </dt>
    <dd>Since release 2.2.4 you can describe, in a special 'relation' table,
        which column is a key in another table (a foreign key). phpMyAdmin
        currently uses this to
        <ul><li>make clickable, when you browse the master table, the data values
                that point to the foreign table;</li>
            <li>display in an optional tool-tip the &quot;display column&quot;
                when browsing the master table, if you move the mouse to a column
                containing a foreign key (use also the 'table_info' table);<br />
                (see <a href="#faqdisplay"><abbr title="Frequently Asked Questions">
                FAQ</abbr> 6.7</a>)</li>
            <li>in edit/insert mode, display a drop-down list of possible foreign
                keys (key value and &quot;display column&quot; are shown)<br />
                (see <a href="#faq6_21"><abbr title="Frequently Asked Questions">
                FAQ</abbr> 6.21</a>)</li>
            <li>display links on the table properties page, to check referential
                integrity (display missing foreign keys) for each described key;
            </li>
            <li>in query-by-example, create automatic joins (see <a href="#faq6_6">
                <abbr title="Frequently Asked Questions">FAQ</abbr> 6.6</a>)</li>
            <li>enable you to get a <abbr title="Portable Document Format">PDF</abbr>
                schema of your database (also uses the table_coords table).</li>
        </ul>

        The keys can be numeric or character.<br /><br />

        To allow the usage of this functionality:

        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin 
                configuration storage</li>
            <li>put the relation table name in
                <tt>$cfg['Servers'][$i]['relation']</tt></li>
            <li>now as normal user open phpMyAdmin and for each one of your
                tables where you want to use this feature, click
                &quot;Structure/Relation view/&quot; and choose foreign
                columns.
                </li>
        </ul>

        Please note that in the current version, <tt>master_db</tt>
        must be the same as <tt>foreign_db</tt>. Those columns have been put in
        future development of the cross-db relations.
    </dd>

    <dt id="table_info">
        <span id="cfg_Servers_table_info">$cfg['Servers'][$i]['table_info']</span> string
    </dt>
    <dd>
        Since release 2.3.0 you can describe, in a special 'table_info'
        table, which column is to be displayed as a tool-tip when moving the
        cursor over the corresponding key.<br />
        This configuration variable will hold the name of this special
        table. To allow the usage of this functionality:
        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in
                <tt>$cfg['Servers'][$i]['table_info']</tt> (e.g.
                'pma_table_info')</li>
            <li>then for each table where you want to use this feature,
                click &quot;Structure/Relation view/Choose column to display&quot;
                to choose the column.</li>
        </ul>
        Usage tip: <a href="#faqdisplay">Display column</a>.
    </dd>
    <dt id="table_coords">
        <span id="cfg_Servers_table_coords">$cfg['Servers'][$i]['table_coords']</span> string<br />
        <span id="cfg_Servers_pdf_pages">$cfg['Servers'][$i]['pdf_pages']</span> string
    </dt>
    <dd>Since release 2.3.0 you can have phpMyAdmin create
        <abbr title="Portable Document Format">PDF</abbr> pages showing
        the relations between your tables. To do this it needs two tables
        &quot;pdf_pages&quot; (storing information about the available
        <abbr title="Portable Document Format">PDF</abbr>
        pages) and &quot;table_coords&quot; (storing coordinates where each
        table will be placed on a <abbr title="Portable Document Format">PDF</abbr>
        schema output).<br /><br />

        You must be using the &quot;relation&quot; feature.<br /><br />

        To allow the usage of this functionality:

        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the correct table names in
                <tt>$cfg['Servers'][$i]['table_coords']</tt> and
                <tt>$cfg['Servers'][$i]['pdf_pages']</tt></li>
        </ul>

        Usage tips: <a href="#faqpdf"><abbr title="Portable Document Format">PDF</abbr> output</a>.
    </dd>

    <dt id="col_com">
        <span id="cfg_Servers_column_info">$cfg['Servers'][$i]['column_info']</span> string
    </dt>
    <dd><!-- This part requires a content update! -->
        Since release 2.3.0 you can store comments to describe each column for
        each table. These will then be shown on the &quot;printview&quot;.
        <br /><br />

        Starting with release 2.5.0, comments are consequently used on the table
        property pages and table browse view, showing up as tool-tips above the
        column name (properties page) or embedded within the header of table in
        browse view. They can also be shown in a table dump. Please see the
        relevant configuration directives later on.<br /><br />

        Also new in release 2.5.0 is a MIME-transformation system which is also
        based on the following table structure. See <a href="#transformations">
        Transformations</a> for further information. To use the
        MIME-transformation system, your column_info table has to have the three
        new columns 'mimetype', 'transformation', 'transformation_options'.
        <br /><br />

        To allow the usage of this functionality:
        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in
                <tt>$cfg['Servers'][$i]['column_info']</tt> (e.g.
                'pma_column_info')</li>
            <li>to update your PRE-2.5.0 Column_comments Table use this:

                <pre>
ALTER TABLE `pma_column_comments`
    ADD `mimetype` VARCHAR( 255 ) NOT NULL,
    ADD `transformation` VARCHAR( 255 ) NOT NULL,
    ADD `transformation_options` VARCHAR( 255 ) NOT NULL;
</pre>

                and remember that the Variable in <i>config.inc.php</i> has been
                renamed from<br />
                <tt>$cfg['Servers'][$i]['column_comments']</tt> to
                <tt>$cfg['Servers'][$i]['column_info']</tt></li>
        </ul>
    </dd>

    <dt id="history">
        <span id="cfg_Servers_history">$cfg['Servers'][$i]['history']</span> string
    </dt>
    <dd>Since release 2.5.0 you can store your
        <abbr title="structured query language">SQL</abbr> history, which means
        all queries you entered manually into the phpMyAdmin interface. If you
        don't want to use a table-based history, you can use the JavaScript-based
        history. Using that, all your history items are deleted when closing the
        window.<br /><br />

        Using
        <a href="#cfg_QueryHistoryMax" class="configrule">$cfg['QueryHistoryMax']</a>
        you can specify an amount of history items you want to have on hold. On
        every login, this list gets cut to the maximum amount.<br /><br />

        The query history is only available if JavaScript is enabled in your
        browser.<br /><br />

        To allow the usage of this functionality:

        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['history']</tt>
            (e.g. 'pma_history')
                </li>
        </ul>
    </dd>

    <dt id="recent">
        <span id="cfg_Servers_recent">$cfg['Servers'][$i]['recent']</span> string
    </dt>
    <dd>
        Since release 3.5.0 you can show recently used tables in the left navigation frame.
        It helps you to jump across table directly, without the need to select the database,
        and then select the table. Using
        <a href="#cfg_LeftRecentTable" class="configrule">$cfg['LeftRecentTable']</a>
        you can configure the maximum number of recent tables shown. When you select a table
        from the list, it will jump to the page specified in
        <a href="#cfg_LeftDefaultTabTable" class="configrule">$cfg['LeftDefaultTabTable']</a>.<br/><br/>

        Without configuring the storage, you can still access the recently used tables,
        but it will disappear after you logout.<br/><br/>

        To allow the usage of this functionality persistently:

        <ul>
            <li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['recent']</tt> (e.g. 'pma_recent')</li>
        </ul>
    </dd>

    <dt id="table_uiprefs">
        <span id="cfg_Servers_table_uiprefs">$cfg['Servers'][$i]['table_uiprefs']</span> string
    </dt>
    <dd>
        Since release 3.5.0 phpMyAdmin can be configured to remember several things
        (sorted column
        <a href="#cfg_RememberSorting" class="configrule">$cfg['RememberSorting']</a>
        , column order, and column visibility from a database table) for browsing tables.
        Without configuring the storage, these features still can be used,
        but the values will disappear after you logout.<br/><br/>

        To allow the usage of these functionality persistently:

        <ul>
            <li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['table_uiprefs']</tt> (e.g. 'pma_table_uiprefs')</li>
        </ul>
    </dd>

    <dt id="tracking">
        <span id="cfg_Servers_tracking">$cfg['Servers'][$i]['tracking']</span> string
    </dt>
    <dd>
        Since release 3.3.x a tracking mechanism is available.
        It helps you to track every <abbr title="structured query language">SQL</abbr> command which 
        is executed by phpMyAdmin. The mechanism supports logging of data manipulation
        and data definition statements. After enabling it you can create versions of tables.
        <br/><br/>
        The creation of a version has two effects:

        <ul>
            <li>phpMyAdmin saves a snapshot of the table, including structure and indexes.</li>
            <li>phpMyAdmin logs all commands which change the structure and/or data of the table and links these commands with the version number.</li>
        </ul>

        Of course you can view the tracked changes. On the "Tracking" page a complete report is available for every version.
        For the report you can use filters, for example you can get a list of statements within a date range.
        When you want to filter usernames you can enter * for all names or you enter a list of names separated by ','.
        In addition you can export the (filtered) report to a file or to a temporary database.
        <br/><br/>
        
        To allow the usage of this functionality:

        <ul>
            <li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['tracking']</tt> (e.g. 'pma_tracking')</li>
        </ul>
    </dd>

    <dt id="tracking2">
        <span id="cfg_Servers_tracking_version_auto_create">$cfg['Servers'][$i]['tracking_version_auto_create']</span> boolean
    </dt>
    <dd>
        Whether the tracking mechanism creates versions for tables and views automatically. Default value is false.
        <br/><br/>
        If this is set to true and you create a table or view with

        <ul>
            <li>CREATE TABLE ...</li>
            <li>CREATE VIEW ...</li>
        </ul>

        and no version exists for it, the mechanism will
        create a version for you automatically.        
    </dd>

    <dt id="tracking3">
        <span id="cfg_Servers_tracking_default_statements">$cfg['Servers'][$i]['tracking_default_statements']</span> string
    </dt>
    <dd>
        Defines the list of statements the auto-creation uses for new versions. Default value is
        <br/>

<pre>CREATE TABLE,ALTER TABLE,DROP TABLE,RENAME TABLE,
CREATE INDEX,DROP INDEX,
INSERT,UPDATE,DELETE,TRUNCATE,REPLACE,
CREATE VIEW,ALTER VIEW,DROP VIEW,
CREATE DATABASE,ALTER DATABASE,DROP DATABASE</pre>
    </dd>

    <dt id="tracking4">
        <span id="cfg_Servers_tracking_add_drop_view">$cfg['Servers'][$i]['tracking_add_drop_view']</span> boolean
    </dt>
    <dd>
        Whether a DROP VIEW IF EXISTS statement will be added as first line to the log when creating a view. Default value is true.
        <br/><br/>       
    </dd>


    <dt id="tracking5">
        <span id="cfg_Servers_tracking_add_drop_table">$cfg['Servers'][$i]['tracking_add_drop_table']</span> boolean
    </dt>
    <dd>
        Whether a DROP TABLE IF EXISTS statement will be added as first line to the log when creating a table. Default value is true.
        <br/><br/>
    </dd>

    <dt id="tracking6">
        <span id="cfg_Servers_tracking_add_drop_database">$cfg['Servers'][$i]['tracking_add_drop_database']</span> boolean
    </dt>
    <dd>
        Whether a DROP DATABASE IF EXISTS statement will be added as first line to the log when creating a database. Default value is true.
        <br/><br/>
    </dd>

    <dt id="userconfig">
        <span id="cfg_Servers_userconfig">$cfg['Servers'][$i]['userconfig']</span> string
    </dt>
    <dd>
        Since release 3.4.x phpMyAdmin allows users to set most preferences by themselves
        and store them in the database.
        <br /><br />

        If you don't allow for storing preferences in <a href="#pmadb">pmadb</a>, users can
        still personalize phpMyAdmin, but settings will be saved in browser's local storage,
        or, it is is unavailable, until the end of session.
        <br /><br />

        To allow the usage of this functionality:

        <ul>
            <li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin
            configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['userconfig']</tt></li>
        </ul>
    </dd>

    <dt id="designer_coords">
        <span id="cfg_Servers_designer_coords">$cfg['Servers'][$i]['designer_coords']</span> string
    </dt>
    <dd>Since release 2.10.0 a Designer interface is available; it permits
        to visually manage the relations.
        <br /><br />

        To allow the usage of this functionality:

        <ul><li>set up <a href="#pmadb">pmadb</a> and the phpMyAdmin configuration storage</li>
            <li>put the table name in <tt>$cfg['Servers'][$i]['designer_coords']</tt> (e.g. 'pma_designer_coords')
                </li>
        </ul>
    </dd>

    <dt><span id="cfg_Servers_MaxTableUiprefs">$cfg['Servers'][$i]['MaxTableUiprefs']</span> integer
    </dt>
    <dd>Maximum number of rows saved in <a
        href="#cfg_Servers_table_uiprefs">$cfg['Servers'][$i]['table_uiprefs']</a> table.<br /><br />

        When tables are dropped or renamed, table_uiprefs may contain invalid 
        data (referring to tables which no longer exist).<br />
        We only keep this number of newest rows in table_uiprefs and automatically delete older rows.</dd>

    <dt><span id="cfg_Servers_verbose_check">$cfg['Servers'][$i]['verbose_check']</span> boolean
    </dt>
    <dd>Because release 2.5.0 introduced the new MIME-transformation support, the
        column_info table got enhanced with three new columns. If the above variable
        is set to <tt>TRUE</tt> (default) phpMyAdmin will check if you have the
        latest table structure available. If not, it will emit a warning to the
        superuser.<br /><br />

        You can disable this checking behavior by setting the variable to false,
        which should offer a performance increase.<br /><br />

        Recommended to set to FALSE, when you are sure, your table structure is
        up to date.</dd>
    <dt><span id="cfg_Servers_AllowRoot">$cfg['Servers'][$i]['AllowRoot']</span>
        boolean</dt>
    <dd>Whether to allow root access. This is just a shortcut for the AllowDeny rules below.
    </dd>
    <dt><span id="cfg_Servers_AllowNoPassword">$cfg['Servers'][$i]['AllowNoPassword']</span>
        boolean</dt>
    <dd>Whether to allow logins without a password. The default
    value of <tt>false</tt> for this parameter prevents unintended access 
    to a MySQL server with was left with an empty password for root or
    on which an anonymous (blank) user is defined.
    </dd>
    <dt id="servers_allowdeny_order">
        <span id="cfg_Servers_AllowDeny_order">$cfg['Servers'][$i]['AllowDeny']['order']</span> string
    </dt>
    <dd>If your rule order is empty, then <abbr title="Internet Protocol">IP</abbr>
        authorization is disabled.<br /><br />

        If your rule order is set to <tt>'deny,allow'</tt> then the system applies
        all deny rules followed by allow rules. Access is allowed by default. Any
        client which does not match a Deny command or does match an Allow command
        will be allowed access to the server. <br /><br />

        If your rule order is set to <tt>'allow,deny'</tt> then the system
        applies all allow rules followed by deny rules. Access is denied by
        default.  Any client which does not match an Allow directive or does
        match a Deny directive will be denied access to the server.<br /><br />

        If your rule order is set to 'explicit', authorization is
        performed in a similar fashion to rule order 'deny,allow', with the
        added restriction that your host/username combination <b>must</b> be
        listed in the <i>allow</i> rules, and not listed in the <i>deny</i>
        rules. This is the <b>most</b> secure means of using Allow/Deny rules,
        and was available in Apache by specifying allow and deny rules without
        setting any order.<br /><br />

        Please also see <a
        href="#cfg_TrustedProxies">$cfg['TrustedProxies']</a> for detecting IP
        address behind proxies.
    </dd>
    <dt id="servers_allowdeny_rules">
        <span id="cfg_Servers_AllowDeny_rules">$cfg['Servers'][$i]['AllowDeny']['rules']</span> array of strings
    </dt>
    <dd>The general format for the rules is as such:

        <pre>
&lt;'allow' | 'deny'&gt; &lt;username&gt; [from] &lt;ipmask&gt;
</pre>

        If you wish to match all users, it is possible to use a <tt>'%'</tt> as
        a wildcard in the <i>username</i> field.<br />
        There are a few shortcuts you can use in the <i>ipmask</i> field as
        well (please note that those containing SERVER_ADDRESS might not be
        available on all webservers):
        <pre>
'all' -&gt; 0.0.0.0/0
'localhost' -&gt; 127.0.0.1/8
'localnetA' -&gt; SERVER_ADDRESS/8
'localnetB' -&gt; SERVER_ADDRESS/16
'localnetC' -&gt; SERVER_ADDRESS/24
</pre>

        Having an empty rule list is equivalent to either using
        <tt>'allow % from all'</tt> if your rule order is set to
        <tt>'deny,allow'</tt> or <tt>'deny % from all'</tt> if your rule order
        is set to <tt>'allow,deny'</tt> or <tt>'explicit'</tt>.<br /><br />

        For the <abbr title="Internet Protocol">IP</abbr> matching system, the
        following work:<br />
        <tt>xxx.xxx.xxx.xxx</tt>        (an exact <abbr title="Internet Protocol">IP</abbr> address)<br />
        <tt>xxx.xxx.xxx.[yyy-zzz]</tt>  (an <abbr title="Internet Protocol">IP</abbr> address range)<br />
        <tt>xxx.xxx.xxx.xxx/nn</tt>     (CIDR, Classless Inter-Domain Routing type <abbr title="Internet Protocol">IP</abbr> addresses)<br />
        But the following does not work:<br />
        <tt>xxx.xxx.xxx.xx[yyy-zzz]</tt> (partial
        <abbr title="Internet Protocol">IP</abbr> address range)<br />
        Also IPv6 addresses are not supported.
    </dd>
    <dt><span id="cfg_Servers_DisableIS">$cfg['Servers'][$i]['DisableIS']</span> boolean</dt>
    <dd>Disable using <tt>INFORMATION_SCHEMA</tt> to retrieve information (use <tt>SHOW</tt> commands instead), because of speed issues when many databases are present. Currently used in some parts of the code, more to come.
    </dd>
    <dt><span id="cfg_Servers_ShowDatabasesCommand">$cfg['Servers'][$i]['ShowDatabasesCommand']</span> string</dt>
    <dd>On a server with a huge number of databases, the default <tt>SHOW
        DATABASES</tt> command used to fetch the name of available databases will
    probably be too slow, so it can be replaced by faster commands (see
    <tt>libraries/config.default.php</tt> for examples).
    </dd>
    <dt><span id="cfg_Servers_CountTables">$cfg['Servers'][$i]['CountTables']</span> boolean</dt>
    <dd>Whether to count the number of tables for each database when preparing the list of databases for the navigation frame.
    </dd>
    <dt><span id="cfg_Servers_SignonScript">$cfg['Servers'][$i]['SignonScript']</span> string</dt>
    <dd>Name of PHP script to be sourced and executed to obtain 
    login credentials. This is alternative approach to session based single 
    signon. The script needs to provide function
    <code>get_login_credentials</code> which returns list of username and
    password, accepting single parameter of existing username (can be empty).
    See <code>examples/signon-script.php</code> for an example.
    </dd>
    <dt><span id="cfg_Servers_SignonSession">$cfg['Servers'][$i]['SignonSession']</span> string</dt>
    <dd>Name of session which will be used for signon authentication method.
    You should use something different than <code>phpMyAdmin</code>, because
    this is session which phpMyAdmin uses internally. Takes effect only if 
    <a href="#cfg_Servers_SignonScript" class="configrule">SignonScript</a>
    is not configured.
    </dd>
    <dt><span id="cfg_Servers_SignonURL">$cfg['Servers'][$i]['SignonURL']</span> string</dt>
    <dd><abbr title="Uniform Resource Locator">URL</abbr> where user will be
    redirected to log in for signon authentication method. Should be absolute
    including protocol.
    </dd>
    <dt><span id="cfg_Servers_LogoutURL">$cfg['Servers'][$i]['LogoutURL']</span> string</dt>
    <dd><abbr title="Uniform Resource Locator">URL</abbr> where user will be
    redirected after logout (doesn't affect config authentication method).
    Should be absolute including protocol.
    </dd>

    <dt id="cfg_ServerDefault">$cfg['ServerDefault'] integer</dt>
    <dd>If you have more than one server configured, you can set
        <tt>$cfg['ServerDefault']</tt> to any one of them to autoconnect to
        that server when phpMyAdmin is started, or set it to 0 to be given a
        list of servers without logging in.<br />
        If you have only one server configured, <tt>$cfg['ServerDefault']</tt>
        MUST be set to that server.</dd>

    <dt id="cfg_AjaxEnable">$cfg['AjaxEnable'] boolean</dt>
    <dd>Defines whether to refresh only parts of certain pages using Ajax
    techniques. Applies only where a non-Ajax behavior is possible;
    for example, the Designer feature is Ajax-only so this directive
    does not apply to it.</dd>

    <dt id="cfg_VersionCheck">$cfg['VersionCheck'] boolean</dt>
    <dd>Enables check for latest versions using javascript on main phpMyAdmin
    page.</dd>

    <dt id="cfg_MaxDbList">$cfg['MaxDbList'] integer</dt>
    <dd>The maximum number of database names to be displayed in the
        navigation frame and the database list.</dd>

    <dt id="cfg_MaxTableList">$cfg['MaxTableList'] integer</dt>
    <dd>The maximum number of table names to be displayed in the
    main panel's list (except on the Export page). This limit is also enforced in the navigation panel
    when in Light mode.</dd>

    <dt id="cfg_ShowHint">$cfg['ShowHint'] boolean</dt>
    <dd>Whether or not to show hints (for example, hints when hovering over table headers).</dd>

    <dt id="cfg_MaxCharactersInDisplayedSQL">$cfg['MaxCharactersInDisplayedSQL'] integer</dt>
    <dd>The maximum number of characters when a <abbr title="structured query language">
    SQL</abbr> query is displayed. The default limit of 1000 should be correct
    to avoid the display of tons of hexadecimal codes that represent BLOBs, but
    some users have real <abbr title="structured query language">SQL</abbr>
    queries that are longer than 1000 characters. Also, if a query's length
    exceeds this limit, this query is not saved in the history.</dd>

    <dt id="cfg_OBGzip">$cfg['OBGzip'] string/boolean</dt>
    <dd>Defines whether to use GZip output buffering for increased
        speed in <abbr title="HyperText Transfer Protocol">HTTP</abbr> transfers.<br />
        Set to true/false for enabling/disabling. When set to 'auto' (string),
        phpMyAdmin tries to enable output buffering and will automatically disable
        it if your browser has some problems with buffering. IE6 with a certain patch
        is known to cause data corruption when having enabled buffering.</dd>

    <dt id="cfg_PersistentConnections">$cfg['PersistentConnections'] boolean</dt>
    <dd>Whether <a href="http://php.net/manual/en/features.persistent-connections.php">persistent connections</a>
        should be used or not. Works with following extensions:
        <ul>
            <li>mysql (<a href="http://php.net/manual/en/function.mysql-pconnect.php">mysql_pconnect</a>),</li>
            <li>mysqli (requires PHP 5.3.0 or newer, <a href="http://php.net/manual/en/mysqli.persistconns.php">more information</a>).</li>
        </ul></dd>

    <dt id="cfg_ForceSSL">$cfg['ForceSSL'] boolean</dt>
    <dd>Whether to force using https while accessing phpMyAdmin.</dd>

    <dt id="cfg_ExecTimeLimit">$cfg['ExecTimeLimit'] integer [number of seconds]</dt>
    <dd>Set the number of seconds a script is allowed to run. If seconds is set
        to zero, no time limit is imposed.<br />
        This setting is used while importing/exporting dump files and in the
        Synchronize feature but has no effect when PHP is running in safe mode.</dd>

    <dt id="cfg_SessionSavePath">$cfg['SessionSavePath'] string</dt>
    <dd>Path for storing session data (<a
    href="http://php.net/session_save_path">session_save_path PHP parameter</a>).</dd>

    <dt id="cfg_MemoryLimit">$cfg['MemoryLimit'] string [number of bytes]</dt>
    <dd>Set the number of bytes a script is allowed to allocate. If set
        to zero, no limit is imposed.<br />
        This setting is used while importing/exporting dump files and at some
        other places in phpMyAdmin so you definitely don't want to put here
        a too low value. It has no effect when PHP is running in safe mode.<br />
        You can also use any string as in php.ini, eg. '16M'. Ensure
        you don't omit the suffix (16 means 16 bytes!)</dd>

    <dt id="cfg_SkipLockedTables">$cfg['SkipLockedTables'] boolean</dt>
    <dd>Mark used tables and make it possible to show databases with locked
        tables (since MySQL 3.23.30).</dd>

    <dt id="cfg_ShowSQL">$cfg['ShowSQL'] boolean</dt>
    <dd>Defines whether <abbr title="structured query language">SQL</abbr> queries
        generated by phpMyAdmin should be displayed or not.</dd>

    <dt id="cfg_RetainQueryBox">$cfg['RetainQueryBox'] boolean</dt>
    <dd>Defines whether the <abbr title="structured query language">SQL</abbr>
        query box should be kept displayed after its submission.</dd>

    <dt id="cfg_AllowUserDropDatabase">$cfg['AllowUserDropDatabase'] boolean</dt>
    <dd>Defines whether normal users (non-administrator) are allowed to
        delete their own database or not. If set as FALSE, the link &quot;Drop
        Database&quot; will not be shown, and even a &quot;DROP DATABASE
        mydatabase&quot; will be rejected. Quite practical for
        <abbr title="Internet service provider">ISP</abbr>'s with many
        customers.<br />
        Please note that this limitation of <abbr title="structured query language">
        SQL</abbr> queries is not as strict as when using MySQL privileges. This
        is due to nature of <abbr title="structured query language">SQL</abbr> queries
        which might be quite complicated. So this choice should be viewed as
        help to avoid accidental dropping rather than strict privilege
        limitation.</dd>

    <dt id="cfg_Confirm">$cfg['Confirm'] boolean</dt>
    <dd>Whether a warning (&quot;Are your really sure...&quot;) should be
        displayed when you're about to lose data.</dd>

    <dt id="cfg_LoginCookieRecall">$cfg['LoginCookieRecall'] boolean</dt>
    <dd>Define whether the previous login should be recalled or not in cookie
        authentication mode.<br /><br />

        This is automatically disabled if you do not have configured 
        <tt><a href="#cfg_blowfish_secret">$cfg['blowfish_secret']</a></tt>.
        </dd>

    <dt id="cfg_LoginCookieValidity">$cfg['LoginCookieValidity'] integer [number of seconds]</dt>
    <dd>Define how long is login cookie valid. Please note that php
        configuration option <a href="http://php.net/manual/en/session.configuration.php#ini.session.gc-maxlifetime">session.gc_maxlifetime</a> 
        might limit session validity and if session is lost, login cookie is
        also invalidated. So it is a good idea to set <code>session.gc_maxlifetime</code> 
        not lower than the value of $cfg['LoginCookieValidity'].</dd>

    <dt id="cfg_LoginCookieStore">$cfg['LoginCookieStore'] integer [number of seconds]</dt>
    <dd>Define how long login cookie should be stored in browser. Default 0
        means that it will be kept for existing session. This is recommended
        for not trusted environments.</dd>

    <dt id="cfg_LoginCookieDeleteAll">$cfg['LoginCookieDeleteAll'] boolean</dt>
    <dd>If enabled (default), logout deletes cookies for all servers,
        otherwise only for current one. Setting this to false makes it easy to
        forget to log out from other server, when you are using more of
        them.</dd>

    <dt id="cfg_UseDbSearch">$cfg['UseDbSearch'] boolean</dt>
    <dd>Define whether the "search string inside database" is enabled or not.</dd>

    <dt id="cfg_IgnoreMultiSubmitErrors">$cfg['IgnoreMultiSubmitErrors'] boolean</dt>
    <dd>Define whether phpMyAdmin will continue executing a multi-query
        statement if one of the queries fails. Default is to abort execution.</dd>

    <dt id="cfg_VerboseMultiSubmit">$cfg['VerboseMultiSubmit'] boolean</dt>
    <dd>Define whether phpMyAdmin will output the results of each query of a
        multi-query statement embedded into the
        <abbr title="structured query language">SQL</abbr> output as inline
        comments. Defaults to <tt>TRUE</tt>.</dd>
    <dt id="AllowArbitraryServer">
        <span id="cfg_AllowArbitraryServer">$cfg['AllowArbitraryServer']</span> boolean</dt>
    <dd>If enabled, allows you to log in to arbitrary servers using cookie auth and permits to specify servers of your choice in the Synchronize dialog.
        <br /><br />

        <b>NOTE:</b> Please use this carefully, as this may allow users access to
        MySQL servers behind the firewall where your
        <abbr title="HyperText Transfer Protocol">HTTP</abbr> server is placed.
    </dd>

    <dt id ="cfg_Error_Handler_display">$cfg['Error_Handler']['display'] boolean</dt>
    <dd>Whether to display errors from PHP or not.</dd>

    <dt id ="cfg_Error_Handler_gather">$cfg['Error_Handler']['gather'] boolean</dt>
    <dd>Whether to gather errors from PHP or not.</dd>

    <dt id="cfg_LeftFrameLight">$cfg['LeftFrameLight'] boolean</dt>
    <dd>Defines whether to use a select-based menu and display only the current
        tables in the left frame (smaller page). Only in Non-Lightmode you can
        use the feature to display nested folders using
        <a href="#cfg_LeftFrameTableSeparator" class="configrule">$cfg['LeftFrameTableSeparator']</a>
    </dd>

    <dt id="cfg_LeftFrameDBTree">$cfg['LeftFrameDBTree'] boolean</dt>
    <dd>Defines whether to display the names of databases (in the
        selector) using a tree, see also
        <a href="#cfg_LeftFrameDBSeparator" class="configrule">$cfg['LeftFrameDBSeparator']</a>.
    </dd>

    <dt id="cfg_LeftFrameDBSeparator">$cfg['LeftFrameDBSeparator']
    string or array</dt>
    <dd>The string used to separate the parts of the database name when showing
        them in a tree. Alternatively you can specify more strings in an array
        and all of them will be used as a separator.</dd>

    <dt id="cfg_LeftFrameTableSeparator">$cfg['LeftFrameTableSeparator'] string</dt>
    <dd>Defines a string to be used to nest table spaces. Defaults to '__'.
        This means if you have tables like 'first__second__third' this will be
        shown as a three-level hierarchy like: first &gt; second &gt; third.
        If set to FALSE or empty, the feature is disabled.  NOTE: You should
        not use this separator at the beginning or end of a
        table name or multiple times after another without any other
        characters in between.</dd>

    <dt id="cfg_LeftFrameTableLevel">$cfg['LeftFrameTableLevel'] string</dt>
    <dd>Defines how many sublevels should be displayed when splitting
        up tables by the above separator.</dd>

    <dt id="cfg_LeftRecentTable">$cfg['LeftRecentTable'] integer</dt>
    <dd>The maximum number of recently used tables shown in the left navigation
        frame. Set this to 0 (zero) to disable the listing of recent tables.</dd>

    <dt id="cfg_ShowTooltip">$cfg['ShowTooltip'] boolean</dt>
    <dd>Defines whether to display table comment as tool-tip in left frame or
        not.</dd>

    <dt id="cfg_ShowTooltipAliasDB">$cfg['ShowTooltipAliasDB'] boolean</dt>
    <dd>If tool-tips are enabled and a DB comment is set, this will flip the
        comment and the real name. That means that if you have a database called
        'user0001' and add the comment 'MyName' on it, you will see the name
        'MyName' used consequently in the left frame and the tool-tip shows
        the real name of the DB.</dd>

    <dt id="cfg_ShowTooltipAliasTB">$cfg['ShowTooltipAliasTB'] boolean/string</dt>
    <dd>Same as <a href="#cfg_ShowTooltipAliasDB" class="configrule">$cfg['ShowTooltipAliasDB']</a>, except this works for table names.

        When setting this to 'nested', the Alias of the Tablename is only used
        to split/nest the tables according to the
        <a href="#cfg_LeftFrameTableSeparator" class="configrule">$cfg['LeftFrameTableSeparator']</a>
        directive. So only the folder is called like the Alias, the tablename itself
        stays the real tablename.</dd>

    <dt id="cfg_LeftDisplayLogo">$cfg['LeftDisplayLogo'] boolean</dt>
    <dd>Defines whether or not to display the phpMyAdmin logo at the top of the left frame.
        Defaults to <tt>TRUE</tt>.</dd>
    <dt id="cfg_LeftLogoLink">$cfg['LeftLogoLink'] string</dt>
    <dd>Enter <abbr title="Uniform Resource Locator">URL</abbr> where logo in the navigation frame will point to.
    For use especially with self made theme which changes this.
    The default value for this is <tt>main.php</tt>.</dd>

    <dt id="cfg_LeftLogoLinkWindow">$cfg['LeftLogoLinkWindow'] string</dt>
    <dd>Whether to open the linked page in the main window (<tt>main</tt>)
    or in a new one (<tt>new</tt>). Note: use <tt>new</tt> if you are
    linking to <tt>phpmyadmin.net</tt>.</dd>

    <dt id="cfg_LeftDisplayTableFilterMinimum">$cfg['LeftDisplayTableFilterMinimum']
    integer</dt>
    <dd>Defines the minimum number of tables to display a JavaScript filter box above the
    list of tables in the left frame.
    Defaults to <tt>30</tt>. To disable the filter completely some high number
    can be used (e.g. 9999)</dd>

    <dt id="cfg_LeftDisplayServers">$cfg['LeftDisplayServers'] boolean</dt>
    <dd>Defines whether or not to display a server choice at the top of the left frame.
        Defaults to FALSE.</dd>
    <dt id="cfg_DisplayServersList">$cfg['DisplayServersList'] boolean</dt>
    <dd>Defines whether to display this server choice as links instead of in a drop-down.
        Defaults to FALSE (drop-down).</dd>
    <dt id="cfg_DisplayDatabasesList">$cfg['DisplayDatabasesList'] boolean or text</dt>
    <dd>Defines whether to display database choice in light navigation frame as links
        instead of in a drop-down. Defaults to 'auto' - on main page list is
        shown, when database is selected, only drop down is displayed.</dd>

    <dt id="cfg_LeftDefaultTabTable">$cfg['LeftDefaultTabTable'] string</dt>
    <dd>Defines the tab displayed by default when clicking the small
        icon next to each table name in the navigation panel. Possible
        values: &quot;tbl_structure.php&quot;,
        &quot;tbl_sql.php&quot;, &quot;tbl_select.php&quot;,
        &quot;tbl_change.php&quot; or &quot;sql.php&quot;.</dd>

    <dt id="cfg_ShowStats">$cfg['ShowStats'] boolean</dt>
    <dd>Defines whether or not to display space usage and statistics about databases
        and tables.<br />
        Note that statistics requires at least MySQL 3.23.3 and that, at this
        date, MySQL doesn't return such information for Berkeley DB tables.</dd>

    <dt><span id="cfg_ShowServerInfo">$cfg['ShowServerInfo'] </span>boolean</dt>
    <dd>Defines whether to display detailed server information on main page.
        You can additionally hide more information by using
        <tt><a href="#cfg_Servers_verbose">$cfg['Servers'][$i]['verbose']</a></tt>.
        </dd>

    <dt><span id="cfg_ShowPhpInfo">$cfg['ShowPhpInfo'] </span>boolean<br />
        <span id="cfg_ShowChgPassword">$cfg['ShowChgPassword'] </span>boolean<br />
        <span id="cfg_ShowCreateDb">$cfg['ShowCreateDb'] </span>boolean
    </dt>
    <dd>Defines whether to display the &quot;PHP information&quot; and
        &quot;Change password &quot; links and form for creating database or
        not at the starting main (right) frame. This setting
        does not check MySQL commands entered directly.<br /><br />

        Please note that to block the usage of phpinfo() in scripts, you
        have to put this in your <i>php.ini</i>:

        <pre>disable_functions = phpinfo()</pre>

        Also note that enabling the &quot;Change password &quot; link has no
        effect with &quot;config&quot; authentication mode: because of the
        hard coded password value in the configuration file, end users can't
        be allowed to change their passwords.</dd>

    <dt id="cfg_SuggestDBName">$cfg['SuggestDBName'] boolean</dt>
    <dd>Defines whether to suggest a database name on the
        &quot;Create Database&quot; form or to keep the textfield empty.</dd>

    <dt id="cfg_NavigationBarIconic">$cfg['NavigationBarIconic'] string</dt>
    <dd>Defines whether navigation bar buttons and the right panel top menu
        contain text or symbols only. A value of TRUE displays icons, FALSE
        displays text and 'both' displays both icons and text.</dd>

    <dt id="cfg_ShowAll">$cfg['ShowAll'] boolean</dt>
    <dd>Defines whether a user should be displayed a
        &quot;Show all&quot; button in browse mode or not in all cases.
        By default it is shown only on small tables (less than 5 &times;
        <a href="#cfg_MaxRows">$cfg['MaxRows']</a> rows) to avoid performance
        issues while getting too many rows.</dd>

    <dt id="cfg_MaxRows">$cfg['MaxRows'] integer</dt>
    <dd>Number of rows displayed when browsing a result set and no LIMIT
    clause is used. If the result set contains more rows, &quot;Previous&quot; and &quot;Next&quot; links will be shown.</dd>

    <dt id="cfg_Order">$cfg['Order'] string [<tt>DESC</tt>|<tt>ASC</tt>|<tt>SMART</tt>]</dt>
    <dd>Defines whether columns are displayed in ascending (<tt>ASC</tt>) order,
        in descending (<tt>DESC</tt>) order or in a &quot;smart&quot;
        (<tt>SMART</tt>) order - I.E. descending order for columns of type TIME,
        DATE, DATETIME and TIMESTAMP, ascending order else- by default.</dd>

    <dt id="cfg_DisplayBinaryAsHex">$cfg['DisplayBinaryAsHex'] boolean </dt>
    <dd>Defines whether the &quot;Show binary contents as HEX&quot; browse
    option is ticked by default.</dd>

    <dt id="cfg_ProtectBinary">$cfg['ProtectBinary'] boolean or string</dt>
    <dd>Defines whether <tt>BLOB</tt> or <tt>BINARY</tt> columns are protected
        from editing when browsing a table's content. Valid values are:
        <ul><li><tt>FALSE</tt> to allow editing of all columns;</li>
            <li><tt>'blob'</tt> to allow editing of all columns except <tt>BLOBS</tt>;</li>
            <li><tt>'all'</tt> to disallow editing of all <tt>BINARY</tt> or
                <tt>BLOB</tt> columns.</li>
        </ul>
    </dd>

    <dt id="cfg_ShowFunctionFields">$cfg['ShowFunctionFields'] boolean</dt>
    <dd>Defines whether or not MySQL functions fields should be initially
        displayed in edit/insert mode. Since version 2.10, the user can
        toggle this setting from the interface.
    </dd>
    
    <dt id="cfg_ShowFieldTypesInDataEditView">$cfg['ShowFieldTypesInDataEditView'] boolean</dt>
    <dd>Defines whether or not type fields should be initially
        displayed in edit/insert mode. The user can
        toggle this setting from the interface.
    </dd>

    <dt id="cfg_CharEditing">$cfg['CharEditing'] string</dt>
    <dd>Defines which type of editing controls should be used for CHAR and
        VARCHAR columns. Possible values are:
        <ul><li>input - this allows to limit size of text to size of columns in
                MySQL, but has problems with newlines in columns</li>
            <li>textarea - no problems with newlines in columns, but also no
                length limitations</li>
        </ul>
        Default is old behavior so input.</dd>

    <dt id="cfg_MinSizeForInputField">$cfg['MinSizeForInputField'] integer</dt>
    <dd>Defines the minimum size for input fields generated for CHAR and
        VARCHAR columns.</dd>

    <dt id="cfg_MaxSizeForInputField">$cfg['MaxSizeForInputField'] integer</dt>
    <dd>Defines the maximum size for input fields generated for CHAR and
        VARCHAR columns.</dd>

    <dt id="cfg_InsertRows">$cfg['InsertRows'] integer</dt>
    <dd>Defines the maximum number of concurrent entries for the Insert page.</dd>

    <dt id="cfg_ForeignKeyMaxLimit">$cfg['ForeignKeyMaxLimit'] integer</dt>
    <dd>If there are fewer items than this in the set of foreign keys, then a
        drop-down box of foreign keys is presented, in the style described by the
        <a href="#cfg_ForeignKeyDropdownOrder" class="configrule">$cfg['ForeignKeyDropdownOrder']</a>
        setting.</dd>

    <dt id="cfg_ForeignKeyDropdownOrder">$cfg['ForeignKeyDropdownOrder'] array</dt>
    <dd>For the foreign key drop-down fields, there are several methods of
        display, offering both the key and value data. The contents of the
        array should be one or both of the following strings:
        <i>'content-id'</i>, <i>'id-content'</i>.</dd>

    <dt><span id="cfg_ZipDump">$cfg['ZipDump'] </span>boolean<br />
        <span id="cfg_GZipDump">$cfg['GZipDump'] </span>boolean<br />
        <span id="cfg_BZipDump">$cfg['BZipDump'] </span>boolean
    </dt>
    <dd>Defines whether to allow the use of zip/GZip/BZip2 compression when
        creating a dump file</dd>

    <dt><span id="cfg_CompressOnFly">$cfg['CompressOnFly'] </span>boolean<br />
    </dt>
    <dd>Defines whether to allow on the fly compression for GZip/BZip2
        compressed exports. This doesn't affect smaller dumps and allows users to
        create larger dumps that won't otherwise fit in memory due to php
        memory limit. Produced files contain more GZip/BZip2 headers, but all
        normal programs handle this correctly.</dd>

    <dt id="cfg_LightTabs">$cfg['LightTabs'] boolean</dt>
    <dd>If set to <tt>TRUE</tt>, use less graphically intense tabs on the top of the
        mainframe.</dd>

    <dt id="cfg_PropertiesIconic">$cfg['PropertiesIconic'] string</dt>
    <dd>If set to <tt>TRUE</tt>, will display icons instead of text for db and table
        properties links (like 'Browse', 'Select', 'Insert', ...).<br /> Can be
        set to <tt>'both'</tt> if you want icons AND text.<br />
        When set to <tt>FALSE</tt>, will only show text.</dd>

    <dt id="cfg_PropertiesNumColumns">$cfg['PropertiesNumColumns'] integer</dt>
    <dd>How many columns will be utilized to display the tables on the
        database property view?  Default is 1 column. When setting this to a
        value larger than 1, the type of the database will be omitted for more
        display space.</dd>


    <dt id="cfg_DefaultTabServer">$cfg['DefaultTabServer'] string</dt>
    <dd>Defines the tab displayed by default on server view. Possible
        values: &quot;main.php&quot; (recommended for multi-user setups),
        &quot;server_databases.php&quot;, &quot;server_status.php&quot;,
        &quot;server_variables.php&quot;, &quot;server_privileges.php&quot;
        or &quot;server_processlist.php&quot;.</dd>

    <dt id="cfg_DefaultTabDatabase">$cfg['DefaultTabDatabase'] string</dt>
    <dd>Defines the tab displayed by default on database view. Possible
        values: &quot;db_structure.php&quot;,
        &quot;db_sql.php&quot; or &quot;db_search.php&quot;.</dd>

    <dt id="cfg_DefaultTabTable">$cfg['DefaultTabTable'] string</dt>
    <dd>Defines the tab displayed by default on table view. Possible
        values: &quot;tbl_structure.php&quot;,
        &quot;tbl_sql.php&quot;, &quot;tbl_select.php&quot;,
        &quot;tbl_change.php&quot; or &quot;sql.php&quot;.</dd>

    <dt id="cfg_MySQLManualBase">$cfg['MySQLManualBase'] string</dt>
    <dd>If set to an <abbr title="Uniform Resource Locator">URL</abbr> which
        points to the MySQL documentation (type depends
        on <a href="#cfg_MySQLManualType" class="configrule">$cfg['MySQLManualType']</a>), appropriate help links are
        generated.<br />
        See <a href="http://dev.mysql.com/doc/">MySQL Documentation page</a>
        for more information about MySQL manuals and their types.</dd>

    <dt id="cfg_MySQLManualType">$cfg['MySQLManualType'] string</dt>
    <dd>Type of MySQL documentation:
        <ul><li>viewable - &quot;viewable online&quot;, current one used on MySQL website</li>
            <li>searchable - &quot;Searchable, with user comments&quot;</li>
            <li>chapters - &quot;HTML, one page per chapter&quot;</li>
            <li>big - &quot;HTML, all on one page&quot;</li>
            <li>none - do not show documentation links</li>
        </ul>
    </dd>

    <dt id="cfg_DefaultLang">$cfg['DefaultLang'] string</dt>
    <dd>Defines the default language to use, if not browser-defined or
        user-defined.<br />
        The corresponding language file needs to be in
        locale/<i>code</i>/LC_MESSAGES/phpmyadmin.mo.
        </dd>

    <dt id="cfg_DefaultConnectionCollation">$cfg['DefaultConnectionCollation'] string</dt>
    <dd>Defines the default connection collation to use, if not
        user-defined.<br />
        See the <a href="http://dev.mysql.com/doc/mysql/en/charset-charsets.html">MySQL
        documentation</a> for list of possible values. This setting is ignored when
		connected to Drizzle server.</dd>

    <dt id="cfg_Lang">$cfg['Lang'] string</dt>
    <dd>Force language to use.<br />
        The corresponding language file needs to be in
        locale/<i>code</i>/LC_MESSAGES/phpmyadmin.mo.
        </dd>

    <dt id="cfg_FilterLanguages">$cfg['FilterLanguages'] string</dt>
    <dd>Limit list of available languages to those matching the given regular
        expression. For example if you want only Czech and English, you should
        set filter to <code>'^(cs|en)'</code>.</dd>

    <dt id="cfg_RecodingEngine">$cfg['RecodingEngine'] string</dt>
    <dd>You can select here which functions will be used for character set
        conversion. Possible values are:
        <ul><li>auto   - automatically use available one (first is tested
                iconv, then recode)</li>
            <li>iconv  - use iconv or libiconv functions</li>
            <li>recode - use recode_string function</li>
            <li>none - disable encoding conversion</li>
        </ul>
        Default is auto.</dd>
    <dd>
        Enabled charset conversion activates a pull-down menu
        in the Export and Import pages, to choose the character set when 
        exporting a file. The default value in this menu comes from 
        <tt>$cfg['Export']['charset']</tt> and <tt>$cfg['Import']['charset']</tt>.
        </dd>

    <dt id="cfg_IconvExtraParams">$cfg['IconvExtraParams'] string</dt>
    <dd>Specify some parameters for iconv used in charset conversion. See
        <a href="http://www.gnu.org/software/libiconv/documentation/libiconv/iconv_open.3.html">iconv
        documentation</a> for details. By default <code>//TRANSLIT</code> is
        used, so that invalid characters will be transliterated.</dd>

    <dt id="cfg_AvailableCharsets">$cfg['AvailableCharsets'] array</dt>
    <dd>Available character sets for MySQL conversion. You can add your own (any of
        supported by recode/iconv) or remove these which you don't use.
        Character sets will be shown in same order as here listed, so if you
        frequently use some of these move them to the top.</dd>

    <dt id="cfg_TrustedProxies">$cfg['TrustedProxies'] array</dt>
    <dd>Lists proxies and HTTP headers which are trusted for <a
        href="#servers_allowdeny_order">IP Allow/Deny</a>. This list is by
        default empty, you need to fill in some trusted proxy servers if you
        want to use rules for IP addresses behind proxy.<br /><br />

        The following example specifies that phpMyAdmin should trust a
        HTTP_X_FORWARDED_FOR (<tt>X-Forwarded-For</tt>) header coming from the proxy 1.2.3.4:
<pre>
$cfg['TrustedProxies'] =
     array('1.2.3.4' =&gt; 'HTTP_X_FORWARDED_FOR');
</pre>
        The $cfg['Servers'][$i]['AllowDeny']['rules'] directive uses the
        client's IP address as usual.
    </dd>

    <dt id="cfg_GD2Available">$cfg['GD2Available'] string</dt>
    <dd>Specifies whether GD &gt;= 2 is available. If yes it can be used for
        MIME transformations.<br />
        Possible values are:
        <ul><li>auto - automatically detect</li>
            <li>yes - GD 2 functions can be used</li>
            <li>no - GD 2 function cannot be used</li>
        </ul>
        Default is auto.
    </dd>

    <dt id="cfg_CheckConfigurationPermissions">$cfg['CheckConfigurationPermissions'] boolean</dt>
    <dd>
    We normally check the permissions on the configuration file to ensure
    it's not world writable. However, phpMyAdmin could be installed on
    a NTFS filesystem mounted on a non-Windows server, in which case the
    permissions seems wrong but in fact cannot be detected. In this case
    a sysadmin would set this parameter to <tt>FALSE</tt>. Default is <tt>TRUE</tt>.
    </dd>

    <dt id="cfg_LinkLengthLimit">$cfg['LinkLengthLimit'] integer</dt>
    <dd>
    Limit for length of <abbr title="Uniform Resource Locator">URL</abbr> in links.
    When length would be above this limit, it is replaced by form with button.
    This is required as some web servers (<abbr title="Internet Information Services">
    IIS</abbr>) have problems with long <abbr title="Uniform Resource Locator">
    URL</abbr>s. Default is <code>1000</code>.
    </dd>

    <dt
    id="cfg_DisableMultiTableMaintenance">$cfg['DisableMultiTableMaintenance'] boolean</dt>
    <dd>
    In the database Structure page, it's possible to mark some tables then
    choose an operation like optimizing for many tables. This can slow down
    a server; therefore, setting this to <code>true</code> prevents this kind
    of multiple maintenance operation. Default is <code>false</code>.
    </dd>

    <dt id="cfg_NaviWidth">$cfg['NaviWidth'] integer</dt>
    <dd>Navi frame width in pixels. See <tt>themes/themename/layout.inc.php</tt>.
    </dd>

    <dt><span id="cfg_NaviBackground">$cfg['NaviBackground']</span> string [CSS color for background]<br />
        <span id="cfg_MainBackground">$cfg['MainBackground']</span> string [CSS color for background]
    </dt>
    <dd>The background styles used for both the frames.
        See <tt>themes/themename/layout.inc.php</tt>.</dd>

    <dt id="cfg_NaviPointerBackground">$cfg['NaviPointerBackground'] string [CSS color for background]<br />
        <span id="cfg_NaviPointerColor">$cfg['NaviPointerColor']</span> string [CSS color]</dt>
    <dd>The style used for the pointer in the navi frame.
        See <tt>themes/themename/layout.inc.php</tt>.</dd>

    <dt id="cfg_LeftPointerEnable">$cfg['LeftPointerEnable'] boolean</dt>
    <dd>A value of <tt>TRUE</tt> activates the navi pointer (when LeftFrameLight
        is <tt>FALSE</tt>).</dd>

    <dt id="cfg_Border">$cfg['Border'] integer</dt>
    <dd>The size of a table's border. See <tt>themes/themename/layout.inc.php</tt>.
    </dd>

    <dt id="cfg_ThBackground">$cfg['ThBackground'] string [CSS color for background]<br />
        <span id="cfg_ThColor">$cfg['ThColor']</span> string [CSS color]</dt>
    <dd>The style used for table headers. See
        <tt>themes/themename/layout.inc.php</tt>.</dd>

    <dt id="cfg_BgcolorOne">$cfg['BgOne'] string [CSS color]</dt>
    <dd>The color (HTML) #1 for table rows. See <tt>themes/themename/layout.inc.php</tt>.
    </dd>

    <dt id="cfg_BgcolorTwo">$cfg['BgTwo'] string [CSS color]</dt>
    <dd>The color (HTML) #2 for table rows. See <tt>themes/themename/layout.inc.php</tt>.
    </dd>

    <dt><span id="cfg_BrowsePointerBackground">$cfg['BrowsePointerBackground'] </span>string [CSS color]<br />
        <span id="cfg_BrowsePointerColor">$cfg['BrowsePointerColor'] </span>string [CSS color]<br />
        <span id="cfg_BrowseMarkerBackground">$cfg['BrowseMarkerBackground'] </span>string [CSS color]<br />
        <span id="cfg_BrowseMarkerColor">$cfg['BrowseMarkerColor'] </span>string [CSS color]
    </dt>
    <dd>The colors (HTML) uses for the pointer and the marker in browse mode.<br />
        The former feature highlights the row over which your mouse is passing
        and the latter lets you visually mark/unmark rows by clicking on
        them. Highlighting / marking a column is done by hovering over /
        clicking the column's header (outside of the text).<br />
        See <tt>themes/themename/layout.inc.php</tt>.</dd>


    <dt id="cfg_FontFamily">$cfg['FontFamily'] string</dt>
    <dd>You put here a valid CSS font family value, for example
    <tt>arial, sans-serif</tt>.<br />
        See <tt>themes/themename/layout.inc.php</tt>.</dd>

    <dt id="cfg_FontFamilyFixed">$cfg['FontFamilyFixed'] string</dt>
    <dd>You put here a valid CSS font family value, for example
    <tt>monospace</tt>. This one is used in textarea.<br />
        See <tt>themes/themename/layout.inc.php</tt>.</dd>

    <dt id="cfg_BrowsePointerEnable">$cfg['BrowsePointerEnable'] boolean</dt>
    <dd>Whether to activate the browse pointer or not.</dd>

    <dt id="cfg_BrowseMarkerEnable">$cfg['BrowseMarkerEnable'] boolean</dt>
    <dd>Whether to activate the browse marker or not.</dd>

    <dt><span id="cfg_TextareaCols">$cfg['TextareaCols'] </span>integer<br />
        <span id="cfg_TextareaRows">$cfg['TextareaRows'] </span>integer<br />
        <span id="cfg_CharTextareaCols">$cfg['CharTextareaCols'] </span>integer<br />
        <span id="cfg_CharTextareaRows">$cfg['CharTextareaRows'] </span>integer
    </dt>
    <dd>Number of columns and rows for the textareas.<br />
        This value will be emphasized (*2) for <abbr title="structured query language">SQL</abbr> query textareas and (*1.25) for
        <abbr title="structured query language">SQL</abbr> textareas inside the query window.<br />
        The Char* values are used for CHAR and VARCHAR editing (if configured
        via <a href="#cfg_CharEditing">$cfg['CharEditing']</a>).</dd>

    <dt><span id="cfg_LongtextDoubleTextarea">$cfg['LongtextDoubleTextarea'] </span>boolean
    </dt>
    <dd>Defines whether textarea for LONGTEXT columns should have double size.</dd>

    <dt><span id="cfg_TextareaAutoSelect">$cfg['TextareaAutoSelect'] </span>boolean
    </dt>
    <dd>Defines if the whole textarea of the query box will be selected on
        click.</dd>

    <dt id="cfg_LimitChars">$cfg['LimitChars'] integer</dt>
    <dd>Maximum number of characters shown in any non-numeric field on browse view.
        Can be turned off by a toggle button on the browse page.</dd>

    <dt><span id="cfg_RowActionLinks">$cfg['RowActionLinks'] </span>string
    </dt>
    <dd>Defines the place where table row links (Edit, Copy,
        Delete) would be put when tables contents are displayed (you may
        have them displayed at the left side, right side, both sides or nowhere).
        &quot;left&quot; and &quot;right&quot; are parsed as &quot;top&quot;
        and &quot;bottom&quot; with vertical display mode.</dd>

    <dt id="cfg_DefaultDisplay">$cfg['DefaultDisplay'] string</dt>
    <dd>There are 3 display modes: horizontal, horizontalflipped and vertical.
        Define which one is displayed by default. The first mode displays each
        row on a horizontal line, the second rotates the headers by 90
        degrees, so you can use descriptive headers even though columns only
        contain small values and still print them out. The vertical mode sorts
        each row on a vertical lineup.
    </dd>

    <dt id="cfg_RememberSorting">$cfg['RememberSorting'] boolean</dt>
    <dd>If enabled, remember the sorting of each table when browsing them.</dd>

    <dt id="cfg_HeaderFlipType">$cfg['HeaderFlipType'] string</dt>
    <dd>
        The HeaderFlipType can be set to 'auto', 'css' or 'fake'. When using
        'css' the rotation of the header for horizontalflipped is done via
        CSS. The CSS transformation currently works only in Internet
        Explorer.If set to 'fake' PHP does the transformation for you, but of
        course this does not look as good as CSS. The 'auto' option enables
        CSS transformation when browser supports it and use PHP based one
        otherwise.
    </dd>

    <dt id="cfg_ShowBrowseComments">$cfg['ShowBrowseComments'] boolean<br />
        <span id="cfg_ShowPropertyComments">$cfg['ShowPropertyComments'] </span>boolean
    </dt>
    <dd>By setting the corresponding variable to <tt>TRUE</tt> you can enable the
        display of column comments in Browse or Property display. In browse
        mode, the comments are shown inside the header. In property mode,
        comments are displayed using a CSS-formatted dashed-line below the
        name of the column. The comment is shown as a tool-tip for that column.
    </dd>

    <dt id ="cfg_SQLQuery_Edit">$cfg['SQLQuery']['Edit'] boolean</dt>
    <dd>Whether to display an edit link to change a query in any SQL Query box.</dd>

    <dt id ="cfg_SQLQuery_Explain">$cfg['SQLQuery']['Explain'] boolean</dt>
    <dd>Whether to display a link to explain a SELECT query in any SQL Query box.</dd>

    <dt id ="cfg_SQLQuery_ShowAsPHP">$cfg['SQLQuery']['ShowAsPHP'] boolean</dt>
    <dd>Whether to display a link to wrap a query in PHP code in any SQL Query box.</dd>

    <dt id ="cfg_SQLQuery_Validate">$cfg['SQLQuery']['Validate'] boolean</dt>
    <dd>Whether to display a link to validate a query in any SQL Query box.
        See also <tt><a href="#cfg_SQLValidator">$cfg_SQLValidator</a></tt>.</dd>

    <dt id ="cfg_SQLQuery_Refresh">$cfg['SQLQuery']['Refresh'] boolean</dt>
    <dd>Whether to display a link to refresh a query in any SQL Query box.</dd>

    <dt id="cfg_UploadDir">$cfg['UploadDir'] string</dt>
    <dd>
        The name of the directory where
        <abbr title="structured query language">SQL</abbr> files have been
        uploaded by other means than phpMyAdmin (for example, ftp).  Those files
    are available under a drop-down box when you click the database or
    table name, then the Import tab.
        <br /><br />

        If you want different directory for each user, %u will be replaced
        with username.<br /><br />

        Please note that the file names must have the suffix &quot;.sql&quot;
        (or &quot;.sql.bz2&quot; or &quot;.sql.gz&quot; if support for
        compressed formats is enabled).<br /><br />

        This feature is useful when your file is too big to be uploaded via
        <abbr title="HyperText Transfer Protocol">HTTP</abbr>, or when file
        uploads are disabled in PHP.<br /><br />

        Please note that if PHP is running in safe mode, this directory must
        be owned by the same user as the owner of the phpMyAdmin scripts.
        <br /><br />

        See also <a href="#faq1_16">
        <abbr title="Frequently Asked Questions">FAQ</abbr> 1.16</a> for
        alternatives.
    </dd>

    <dt id="cfg_SaveDir">$cfg['SaveDir'] string</dt>
    <dd>
        The name of the directory where dumps can be saved.<br /><br />

        If you want different directory for each user, %u will be replaced
        with username.<br /><br />

    Please note that the directory must exist and has to be writable for
    the user running webserver.<br /><br />

        Please note that if PHP is running in safe mode, this directory must
        be owned by the same user as the owner of the phpMyAdmin scripts.
    </dd>

    <dt id="cfg_TempDir">$cfg['TempDir'] string</dt>
    <dd>
        The name of the directory where temporary files can be stored. 
        <br /><br />

        This is needed for importing ESRI Shapefiles, see
        <a href="#faq6_30"><abbr title="Frequently Asked Questions">FAQ</abbr>
        6.30</a> and to work around limitations of <tt>open_basedir</tt> for uploaded
        files, see <a href="#faq1_11"><abbr title="Frequently Asked Questions">FAQ</abbr>
        1.11</a>.
        <br /><br />

    If the directory where phpMyAdmin is installed is subject to an
    <tt>open_basedir</tt> restriction, you need to create a
        temporary directory in some directory accessible by the web
        server. However for security reasons, this directory should be outside
        the tree published by webserver. If you cannot avoid having this
        directory published by webserver, place at least an empty
        <tt>index.html</tt> file there, so that directory listing is not
        possible.
        <br /><br />

        This directory should have as strict permissions as possible as the only
        user required to access this directory is the one who runs the
        webserver. If you have root privileges, simply make this user owner of
        this directory and make it accessible only by it:
        <br /><br />

<pre>
chown www-data:www-data tmp
chmod 700 tmp
</pre>

        If you cannot change owner of the directory, you can achieve a similar
        setup using <abbr title="Access Control List">ACL</abbr>:

<pre>
chmod 700 tmp
setfacl -m "g:www-data:rwx" tmp
setfacl -d -m "g:www-data:rwx" tmp
</pre>

        If neither of above works for you, you can still make the directory
        <code>chmod 777</code>, but it might impose risk of other users on
        system reading and writing data in this directory.
    </dd>

    <dt id="cfg_Export">$cfg['Export'] array</dt>
    <dd>
        In this array are defined default parameters for export, names of
        items are similar to texts seen on export page, so you can easily
        identify what they mean.
    </dd>

    <dt id="cfg_Export_method">$cfg['Export']['method'] string</dt>
    <dd>
        Defines how the export form is displayed when it loads. Valid values are:
        <ul>
        <li><tt>quick</tt> to display the minimum number of options to configure</li>
        <li><tt>custom</tt> to display every available option to configure</li>
        <li><tt>custom-no-form</tt> same as <tt>custom</tt> but does not display the option of using quick export</li>
        </ul>
    </dd>

    <dt id="cfg_Import">$cfg['Import'] array</dt>
    <dd>
        In this array are defined default parameters for import, names of
        items are similar to texts seen on import page, so you can easily
        identify what they mean.
    </dd>

    <dt id="cfg_SaveCellsAtOnce">$cfg['SaveCellsAtOnce'] boolean</dt>
    <dd>
        Defines whether or not to save all edited cells at once in browse-mode.
    </dd>

    <dt id="cfg_ShowDisplayDirection">$cfg['ShowDisplayDirection'] boolean</dt>
    <dd>
        Defines whether or not type display direction option is shown
        when browsing a table.
    </dd>

    <dt id="cfg_RepeatCells">$cfg['RepeatCells'] integer</dt>
    <dd>
        Repeat the headers every X cells, or 0 to deactivate.
    </dd>

    <dt id="cfg_EditInWindow">$cfg['EditInWindow'] boolean<br />
        <span id="cfg_QueryWindowWidth">$cfg['QueryWindowWidth'] </span>integer<br />
        <span id="cfg_QueryWindowHeight">$cfg['QueryWindowHeight'] </span>integer<br />
        <span id="cfg_QueryHistoryDB">$cfg['QueryHistoryDB'] </span>boolean<br />
        <span id="cfg_QueryWindowDefTab">$cfg['QueryWindowDefTab'] </span>string<br />
        <span id="cfg_QueryHistoryMax">$cfg['QueryHistoryMax'] </span>integer
    </dt>
    <dd>
        All those variables affect the query window feature. A <tt><abbr title="structured query language">SQL</abbr></tt> link
        or icon is always displayed on the left panel. If JavaScript is enabled in
        your browser, a click on this opens a distinct query window, which is
        a direct interface to enter <abbr title="structured query language">SQL</abbr> queries. Otherwise, the right panel
        changes to display a query box.<br /><br />

        The size of this query window can be customized with
        <tt>$cfg['QueryWindowWidth']</tt> and <tt>$cfg['QueryWindowHeight']</tt>
        - both integers for the size in pixels. Note that normally, those
        parameters will be modified in <tt>layout.inc.php</tt> for the
        theme you are using.<br /><br />

        If <tt>$cfg['EditInWindow']</tt> is set to true, a click on [Edit]
        from the results page (in the &quot;Showing Rows&quot; section)
        opens the query window and puts the current query
        inside it.  If set to false, clicking on the link puts the <abbr title="structured query language">SQL</abbr>
        query in the right panel's query box.
        <br /><br />
        The usage of the JavaScript query window is recommended if you have a
        JavaScript enabled browser. Basic functions are used to exchange quite
        a few variables, so most 4th generation browsers should be capable to
        use that feature. It currently is only tested with Internet Explorer 6
        and Mozilla 1.x.
        <br /><br />
        If <tt>$cfg['QueryHistoryDB']</tt> is set to <tt>TRUE</tt>, all your Queries are logged
        to a table, which has to be created by you (see <a
        href="#history" class="configrule">$cfg['Servers'][$i]['history']</a>).  If set to FALSE,
        all your queries will be appended to the form, but only as long as
        your window is opened they remain saved.
        <br /><br />
        When using the JavaScript based query window, it will always get
        updated when you click on a new table/db to browse and will focus if
        you click on "Edit <abbr title="structured query language">SQL</abbr>" after using a query. You can suppress updating
        the query window by checking the box "Do not overwrite this query from
        outside the window" below the query textarea. Then you can browse
        tables/databases in the background without losing the contents of the
        textarea, so this is especially useful when composing a query with
        tables you first have to look in. The checkbox will get automatically
        checked whenever you change the contents of the textarea. Please
        uncheck the button whenever you definitely want the query window to
        get updated even though you have made alterations.
        <br /><br />
        If <tt>$cfg['QueryHistoryDB']</tt> is set to <tt>TRUE</tt> you can specify the amount of
        saved history items using <tt>$cfg['QueryHistoryMax']</tt>.
        <br /><br />
        The query window also has a custom tabbed look to group the features.
        Using the variable <tt>$cfg['QueryWindowDefTab']</tt> you can specify the
        default tab to be used when opening the query window. It can be set to
        either 'sql', 'files', 'history' or 'full'.</dd>

    <dt id="cfg_BrowseMIME">$cfg['BrowseMIME'] boolean</dt>
    <dd>Enable <a href="#transformations">MIME-transformations</a>.</dd>

    <dt id="cfg_MaxExactCount">$cfg['MaxExactCount'] integer</dt>
    <dd>For InnoDB tables, determines for how large tables phpMyAdmin
                should get the exact row count using <code>SELECT COUNT</code>.
                If the approximate row count as returned by
                <code>SHOW TABLE STATUS</code> is smaller than this value,
                <code>SELECT COUNT</code> will be used, otherwise the approximate
                count will be used.
    </dd>
    <dt id="cfg_MaxExactCountViews">$cfg['MaxExactCountViews'] integer</dt>
    <dd>For VIEWs, since obtaining the exact count could have an
    impact on performance, this value is the maximum to be displayed, using
    a <code>SELECT COUNT ... LIMIT</code>. Setting this to 0 bypasses
    any row counting.
    </dd>

    <dt id="cfg_NaturalOrder">$cfg['NaturalOrder'] boolean</dt>
    <dd>Sorts database and table names according to natural order (for example,
        t1, t2, t10). Currently implemented in the left panel (Light mode)
        and in Database view, for the table list.</dd>

    <dt id="cfg_InitialSlidersState">$cfg['InitialSlidersState'] string</dt>
    <dd>If set to <tt>'closed'</tt>, the visual sliders are initially in a
    closed state. A value of <tt>'open'</tt> does the reverse. To completely 
    disable all visual sliders, use <tt>'disabled'</tt>.</dd>

    <dt id="cfg_UserprefsDisallow">$cfg['UserprefsDisallow'] array</dt>
    <dd>Contains names of configuration options (keys in <tt>$cfg</tt> array)
        that users can't set through user preferences. For possible values, refer
        to <tt>libraries/config/user_preferences.forms.php</tt>.</dd>

    <dt id="cfg_UserprefsDeveloperTab">$cfg['UserprefsDeveloperTab'] boolean</dt>
    <dd>Activates in the user preferences a tab containing options for 
        developers of phpMyAdmin.</dd>

    <dt id="cfg_TitleTable">$cfg['TitleTable'] string</dt>
    <dt id="cfg_TitleDatabase">$cfg['TitleDatabase'] string</dt>
    <dt id="cfg_TitleServer">$cfg['TitleServer'] string</dt>
    <dt id="cfg_TitleDefault">$cfg['TitleDefault'] string</dt>
    <dd>Allows you to specify window's title bar. You can use 
        <a href="#faq6_27">format string expansion</a>.
    </dd>

    <dt id="cfg_ErrorIconic">$cfg['ErrorIconic'] boolean</dt>
    <dd>Uses icons for warnings, errors and informations.</dd>

    <dt id="cfg_MainPageIconic">$cfg['MainPageIconic'] boolean</dt>
    <dd>Uses icons on main page in lists and menu tabs.</dd>

    <dt id="cfg_ReplaceHelpImg">$cfg['ReplaceHelpImg'] boolean</dt>
    <dd>Shows a help button instead of the &quot;Documentation&quot; message.
    </dd>

    <dt id="cfg_ThemePath">$cfg['ThemePath'] string</dt>
    <dd>If theme manager is active, use this as the path of the subdirectory
        containing all the themes.</dd>

    <dt id="cfg_ThemeManager">$cfg['ThemeManager'] boolean</dt>
    <dd>Enables user-selectable themes. See <a href="#faqthemes">
        <abbr title="Frequently Asked Questions">FAQ</abbr> 2.7</a>.</dd>

    <dt id="cfg_ThemeDefault">$cfg['ThemeDefault'] string</dt>
    <dd>The default theme (a subdirectory under <tt>cfg['ThemePath']</tt>).</dd>

    <dt id="cfg_ThemePerServer">$cfg['ThemePerServer'] boolean</dt>
    <dd>Whether to allow different theme for each server.</dd>

    <dt id="cfg_DefaultQueryTable">$cfg['DefaultQueryTable'] string<br />
        <span id="cfg_DefaultQueryDatabase">$cfg['DefaultQueryDatabase']</span> string
    </dt>
    <dd>Default queries that will be displayed in query boxes when user didn't
        specify any. You can use standard 
        <a href="#faq6_27">format string expansion</a>.
        </dd>

    <dt id="cfg_SQP_fmtType">$cfg['SQP']['fmtType'] string [<tt>html</tt>|<tt>none</tt>]</dt>
    <dd>
        The main use of the new <abbr title="structured query language">SQL</abbr> Parser is to pretty-print <abbr title="structured query language">SQL</abbr> queries. By
        default we use HTML to format the query, but you can disable this by
        setting this variable to <tt>'none'</tt>.
    </dd>

    <dt id="cfg_SQP_fmtInd">$cfg['SQP']['fmtInd'] float<br />
        <span id="cfg_SQP">$cfg['SQP']['fmtIndUnit']</span> string [<tt>em</tt>|<tt>px</tt>|<tt>pt</tt>|<tt>ex</tt>]</dt>
    <dd>For the pretty-printing of <abbr title="structured query language">SQL</abbr> queries, under some cases the part of a
        query inside a bracket is indented. By changing
        <tt>$cfg['SQP']['fmtInd']</tt> you can change the amount of this indent.
        <br />Related in purpose is <tt>$cfg['SQP']['fmtIndUnit']</tt> which
        specifies the units of the indent amount that you specified. This is
        used via stylesheets.</dd>

    <dt id="cfg_SQP_fmtColor">$cfg['SQP']['fmtColor'] array of string tuples</dt>
    <dd>This array is used to define the colours for each type of element of
        the pretty-printed <abbr title="structured query language">SQL</abbr> queries. The tuple format is<br />
        <i>class</i> =&gt; [<i>HTML colour code</i> | <i>empty string</i>]<br />
        If you specify an empty string for the color of a class, it is ignored
        in creating the stylesheet.
        You should not alter the class names, only the colour strings.<br />
        <b>Class name key:</b>
        <ul><li><b>comment</b> Applies to all comment sub-classes</li>
            <li><b>comment_mysql</b> Comments as <tt>"#...\n"</tt></li>
            <li><b>comment_ansi</b> Comments as <tt>"-- ...\n"</tt></li>
            <li><b>comment_c</b> Comments as <tt>"/*...*/"</tt></li>
            <li><b>digit</b> Applies to all digit sub-classes</li>
            <li><b>digit_hex</b> Hexadecimal numbers</li>
            <li><b>digit_integer</b> Integer numbers</li>
            <li><b>digit_float</b> Floating point numbers</li>
            <li><b>punct</b> Applies to all punctuation sub-classes</li>
            <li><b>punct_bracket_open_round</b> Opening brackets<tt>"("</tt></li>
            <li><b>punct_bracket_close_round</b> Closing brackets <tt>")"</tt></li>
            <li><b>punct_listsep</b> List item Separator <tt>","</tt></li>
            <li><b>punct_qualifier</b> Table/Column Qualifier <tt>"."</tt> </li>
            <li><b>punct_queryend</b> End of query marker <tt>";"</tt></li>
            <li><b>alpha</b> Applies to all alphabetic classes</li>
            <li><b>alpha_columnType</b> Identifiers matching a column type</li>
            <li><b>alpha_columnAttrib</b> Identifiers matching a database/table/column attribute</li>
            <li><b>alpha_functionName</b> Identifiers matching a MySQL function name</li>
            <li><b>alpha_reservedWord</b> Identifiers matching any other reserved word</li>
            <li><b>alpha_variable</b> Identifiers matching a <abbr title="structured query language">SQL</abbr> variable <tt>"@foo"</tt></li>
            <li><b>alpha_identifier</b> All other identifiers</li>
            <li><b>quote</b> Applies to all quotation mark classes</li>
            <li><b>quote_double</b> Double quotes <tt>"</tt></li>
            <li><b>quote_single</b> Single quotes <tt>'</tt></li>
            <li><b>quote_backtick</b> Backtick quotes <tt>`</tt></li>
        </ul>
    </dd>

    <dt id="cfg_SQLValidator">$cfg['SQLValidator'] boolean</dt>
    <dd><dl><dt id="cfg_SQLValidator_use">$cfg['SQLValidator']['use'] boolean</dt>
            <dd>phpMyAdmin now supports use of the <a href="http://developer.mimer.com/validator/index.htm">Mimer <abbr title="structured query language">SQL</abbr> Validator</a> service,
                as originally published on
                <a  href="http://developers.slashdot.org/article.pl?sid=02/02/19/1720246">Slashdot</a>.
                <br />
                For help in setting up your system to use the service, see the
                <a href="#faqsqlvalidator"><abbr title="Frequently Asked Questions">FAQ</abbr> 6.14</a>.
            </dd>

            <dt id="cfg_SQLValidator_username">$cfg['SQLValidator']['username'] string<br />
                <span id="cfg_SQLValidator_password">$cfg['SQLValidator']['password']</span> string</dt>
            <dd>The SOAP service allows you to log in with <tt>anonymous</tt>
                and any password, so we use those by default. Instead, if
                you have an account with them, you can put your login details
                here, and it will be used in place of the anonymous login.</dd>
        </dl>
    </dd>

    <dt id="cfg_DBG">$cfg['DBG']</dt>
    <dd><b>DEVELOPERS ONLY!</b></dd>

    <dt id="cfg_DBG_sql">$cfg['DBG']['sql'] boolean</dt>
    <dd><b>DEVELOPERS ONLY!</b><br />
        Enable logging queries and execution times to be displayed in the bottom
        of main page (right frame).</dd>

    <dt id="cfg_ColumnTypes">$cfg['ColumnTypes'] array</dt>
    <dd>All possible types of a MySQL column. In most cases you don't need to
        edit this.</dd>

    <dt id="cfg_AttributeTypes">$cfg['AttributeTypes'] array</dt>
    <dd>Possible attributes for columns. In most cases you don't need to edit
        this.</dd>

    <dt id="cfg_Functions">$cfg['Functions'] array</dt>
    <dd>A list of functions MySQL supports. In most cases you don't need to
        edit this.</dd>

    <dt id="cfg_RestrictColumnTypes">$cfg['RestrictColumnTypes'] array</dt>
    <dd>Mapping of column types to meta types used for preferring displayed
        functions. In most cases you don't need to edit this.</dd>

    <dt id="cfg_RestrictFunctions">$cfg['RestrictFunctions'] array</dt>
    <dd>Functions preferred for column meta types as defined in
        <a href="#cfg_RestrictColumnTypes" class="configrule">$cfg['RestrictColumnTypes']</a>. In most cases you don't need
        to edit this.</dd>

    <dt id="cfg_DefaultFunctions">$cfg['DefaultFunctions'] array</dt>
    <dd>Functions selected by default when inserting/changing row, Functions
        are defined for meta types from
        <a href="#cfg_RestrictColumnTypes" class="configrule">$cfg['RestrictColumnTypes']</a> and for
        <code>first_timestamp</code>, which is used for first timestamp column
        in table.</dd>

</dl>

<!-- TRANSFORMATIONS -->
<h2 id="transformations">Transformations</h2>

<ol><li><a href="#transformationsintro">Introduction</a></li>
    <li><a href="#transformationshowto">Usage</a></li>
    <li><a href="#transformationsfiles">File structure</a></li>
</ol>

<h3 id="transformationsintro">1. Introduction</h3>

<p> To enable transformations, you have to setup the <tt>column_info</tt> table
    and the proper directives. Please see the <a href="#config">Configuration
    section</a> on how to do so.</p>

<p> You can apply different transformations to the contents of each column. The
    transformation will take the content of each column and transform it with
    certain rules defined in the selected transformation.</p>

<p> Say you have a column 'filename' which contains a filename. Normally you would
    see in phpMyAdmin only this filename. Using transformations you can transform
    that filename into a HTML link, so you can click inside of the phpMyAdmin
    structure on the column's link and will see the file displayed in a new browser
    window. Using transformation options you can also specify strings to
    append/prepend to a string or the format you want the output stored in.</p>

<p> For a general overview of all available transformations and their options,
    you can consult your
    <i>&lt;www.your-host.com&gt;/&lt;your-install-dir&gt;/transformation_overview.php</i>
    installation.</p>

<p> For a tutorial on how to effectively use transformations, see our
    <a href="http://www.phpmyadmin.net/home_page/docs.php">Link section</a> on
    the official phpMyAdmin homepage.</p>

<h3 id="transformationshowto">2. Usage</h3>

<p> Go to your <i>tbl_structure.php</i> page (i.e. reached through
    clicking on the 'Structure' link for a table). There click on
    &quot;Change&quot; (or change icon) and there you will see three new
    fields at
    the end of the line. They are called 'MIME-type', 'Browser transformation' and
    'Transformation options'.</p>

    <ul><li>The field 'MIME-type' is a drop-down field. Select the MIME-type
    that corresponds to the column's contents. Please note that
        transformations are inactive as long as no MIME-type is selected.</li>

    <li>The field 'Browser transformation' is a drop-down field. You can choose from a
        hopefully growing amount of pre-defined transformations. See below for information on
        how to build your own transformation.<br />

        There are global transformations and mimetype-bound transformations. Global transformations
        can be used for any mimetype. They will take the mimetype, if necessary, into regard.
        Mimetype-bound transformations usually only operate on a certain mimetype. There are
        transformations which operate on the main mimetype (like 'image'), which will most likely
        take the subtype into regard, and those who only operate on a
        specific subtype (like 'image/jpeg').<br />

        You can use transformations on mimetypes for which the function was not defined for. There
        is no security check for you selected the right transformation, so take care of what the
        output will be like.</li>

    <li>The field 'Transformation options' is a free-type textfield. You have to enter
        transform-function specific options here. Usually the transforms can operate with default
        options, but it is generally a good idea to look up the overview to see which options are
        necessary.<br />

        Much like the ENUM/SET-Fields, you have to split up several options using the format
        'a','b','c',...(NOTE THE MISSING BLANKS). This is because internally the options will be
        parsed as an array, leaving the first value the first element in the array, and so
        forth.<br />

        If you want to specify a MIME character set you can define it in the transformation_options.
        You have to put that outside of the pre-defined options of the specific mime-transform,
        as the last value of the set. Use the format "'; charset=XXX'". If you use a transform,
        for which you can specify 2 options and you want to append a character set, enter "'first
        parameter','second parameter','charset=us-ascii'". You can, however use the defaults for
        the parameters: "'','','charset=us-ascii'".</li>
</ul>

<h3 id="transformationsfiles">3. File structure</h3>

<p> All mimetypes and their transformations are defined through single files in
    the directory 'libraries/transformations/'.</p>

<p> They are stored in files to ease up customization and easy adding of new
    transformations.</p>

<p> Because the user cannot enter own mimetypes, it is kept sure that transformations
    always work. It makes no sense to apply a transformation to a mimetype the
    transform-function doesn't know to handle.</p>

<p> One can, however, use empty mime-types and global transformations which should work
    for many mimetypes. You can also use transforms on a different mimetype than what they where built
    for, but pay attention to option usage as well as what the transformation does to your
    column.</p>

<p> There is a basic file called '<i>global.inc.php</i>'. This function can be included by
    any other transform function and provides some basic functions.</p>

<p> There are 5 possible file names:</p>

<ol><li>A mimetype+subtype transform:<br /><br />

        <tt>[mimetype]_[subtype]__[transform].inc.php</tt><br /><br />

        Please not that mimetype and subtype are separated via '_', which shall
        not be contained in their names. The transform function/filename may
        contain only characters which cause no problems in the file system as
        well as the PHP function naming convention.<br /><br />

        The transform function will the be called
        '<tt>PMA_transform_[mimetype]_[subtype]__[transform]()</tt>'.<br /><br />

        <b>Example:</b><br /><br />

        <tt>text_html__formatted.inc.php</tt><br />
        <tt>PMA_transform_text_html__formatted()</tt></li>

    <li>A mimetype (w/o subtype) transform:<br /><br />

        <tt>[mimetype]__[transform].inc.php</tt><br /><br />

        Please note that there are no single '_' characters.
        The transform function/filename may contain only characters which cause
        no problems in the file system as well as the PHP function naming
        convention.<br /><br />

        The transform function will the be called
        '<tt>PMA_transform_[mimetype]__[transform]()</tt>'.<br /><br />

        <b>Example:</b><br /><br />

        <tt>text__formatted.inc.php</tt><br />
        <tt>PMA_transform_text__formatted()</tt></li>

    <li>A mimetype+subtype without specific transform function<br /><br />

        <tt>[mimetype]_[subtype].inc.php</tt><br /><br />

        Please note that there are no '__' characters in the filename. Do not
        use special characters in the filename causing problems with the file
        system.<br /><br />

        No transformation function is defined in the file itself.<br /><br />

        <b>Example:</b><br /><br />

        <tt>text_plain.inc.php</tt><br />
        (No function)</li>

    <li>A mimetype (w/o subtype) without specific transform function<br /><br />

        <tt>[mimetype].inc.php</tt><br /><br />

        Please note that there are no '_' characters in the filename. Do not use
        special characters in the filename causing problems with the file system.
        <br /><br />

        No transformation function is defined in the file itself.<br /><br />

        <b>Example:</b><br /><br />

        <tt>text.inc.php</tt><br />
        (No function)</li>

    <li>A global transform function with no specific mimetype<br /><br />

        <tt>global__[transform].inc.php</tt><br /><br />

        The transform function will the be called
        '<tt>PMA_transform_global__[transform]()</tt>'.<br /><br />

        <b>Example:</b><br /><br />

        <tt>global__formatted</tt><br />
        <tt>PMA_transform_global__formatted()</tt></li>
</ol>

<p> So generally use '_' to split up mimetype and subtype, and '__' to provide a
    transform function.</p>

<p> All filenames containing no '__' in themselves are not shown as valid transform
    functions in the dropdown.</p>

<p> Please see the libraries/transformations/TEMPLATE file for adding your own transform
    function. See the libraries/transformations/TEMPLATE_MIMETYPE for adding a mimetype
    without a transform function.</p>

<p> To create a new transform function please see
    <tt>libraries/transformations/template_generator.sh</tt>.
    To create a new, empty mimetype please see
    <tt>libraries/transformations/template_generator_mimetype.sh</tt>.</p>

<p> A transform function always gets passed three variables:</p>

<ol><li><b>$buffer</b> - Contains the text inside of the column. This is the text,
        you want to transform.</li>
    <li><b>$options</b> - Contains any user-passed options to a transform function
        as an array.</li>
    <li><b>$meta</b> - Contains an object with information about your column.
        The data is drawn from the output of the
        <a href="http://www.php.net/mysql_fetch_field">mysql_fetch_field()</a>
        function. This means, all object properties described on the
        <a href="http://www.php.net/mysql_fetch_field">manual page</a> are
        available in this variable and can be used to transform a column accordingly
        to unsigned/zerofill/not_null/... properties.<br />
        The $meta-&gt;mimetype variable contains the original MIME-type of the
        column (i.e. 'text/plain', 'image/jpeg' etc.)</li>
</ol>

<p> Additionally you should also provide additional function to provide 
    information about the transformation to the user. This function should
    have same name as transformation function just with appended
    <code>_info</code> suffix. This function accepts no parameters and returns
    array with information about the transformation. Currently following keys
    can be used:
</p>
<dl>
    <dt><code>info</code></dt>
    <dd>Long description of the transformation.</dd>
</dl>

<!-- FAQ -->
<h2 id="faq">FAQ - Frequently Asked Questions</h2>

<ol><li><a href="#faqserver">Server</a></li>
    <li><a href="#faqconfig">Configuration</a></li>
    <li><a href="#faqlimitations">Known limitations</a></li>
    <li><a href="#faqmultiuser">ISPs, multi-user installations</a></li>
    <li><a href="#faqbrowsers">Browsers or client <abbr title="operating system">OS</abbr></a></li>
    <li><a href="#faqusing">Using phpMyAdmin</a></li>
    <li><a href="#faqproject">phpMyAdmin project</a></li>
    <li><a href="#faqsecurity">Security</a></li>
    <li><a href="#faqsynchronization">Synchronization</a></li>
</ol>

<p> Please have a look at our
    <a href="http://www.phpmyadmin.net/home_page/docs.php">Link section</a> on
    the official phpMyAdmin homepage for in-depth coverage of phpMyAdmin's
    features and or interface.</p>

<h3 id="faqserver">Server</h3>

<h4 id="faq1_1">
    <a href="#faq1_1">1.1 My server is crashing each time a specific
    action is required or phpMyAdmin sends a blank page or a page full of
    cryptic characters to my browser, what can I do?</a></h4>

<p> Try to set the <a href="#cfg_OBGzip" class="configrule">$cfg['OBGzip']</a>
    directive to <tt>FALSE</tt> in your <i>config.inc.php</i> file and the
    <tt>zlib.output_compression</tt> directive to <tt>Off</tt> in your php
    configuration file.<br /></p>

<h4 id="faq1_2">
    <a href="#faq1_2">1.2 My Apache server crashes when using phpMyAdmin.</a></h4>

<p> You should first try the latest versions of Apache (and possibly MySQL).<br />
    See also the
    <a href="#faq1_1"><abbr title="Frequently Asked Questions">FAQ</abbr> 1.1</a>
    entry about PHP bugs with output buffering.<br />
    If your server keeps crashing, please ask for help in the various Apache
    support groups.</p>

<h4 id="faq1_3">
    <a href="#faq1_3">1.3 (withdrawn).</a></h4>

<h4 id="faq1_4">
    <a href="#faq1_4">1.4 Using phpMyAdmin on
    <abbr title="Internet Information Services">IIS</abbr>, I'm displayed the
    error message: &quot;The specified <abbr title="Common Gateway Interface">CGI</abbr>
    application misbehaved by not returning a complete set of
    <abbr title="HyperText Transfer Protocol">HTTP</abbr> headers ...&quot;.</a>
</h4>

<p> You just forgot to read the <i>install.txt</i> file from the PHP distribution.
    Have a look at the last message in this
    <a href="http://bugs.php.net/bug.php?id=12061">bug report</a> from the
    official PHP bug database.</p>

<h4 id="faq1_5">
    <a href="#faq1_5">1.5 Using phpMyAdmin on
    <abbr title="Internet Information Services">IIS</abbr>, I'm facing crashes
    and/or many error messages with the
    <abbr title="HyperText Transfer Protocol">HTTP</abbr>.</a></h4>

<p> This is a known problem with the PHP
    <abbr title="Internet Server Application Programming Interface">ISAPI</abbr>
    filter: it's not so stable. Please use instead the cookie authentication mode.
</p>

<h4 id="faq1_6">
    <a href="#faq1_6">1.6 I can't use phpMyAdmin on PWS: nothing is displayed!</a></h4>

<p> This seems to be a PWS bug. Filippo Simoncini found a workaround (at this
    time there is no better fix): remove or comment the <tt>DOCTYPE</tt>
    declarations (2 lines) from the scripts <i>libraries/header.inc.php</i>,
    <i>libraries/header_printview.inc.php</i>, <i>index.php</i>,
    <i>navigation.php</i> and <i>libraries/common.lib.php</i>.</p>

<h4 id="faq1_7">
    <a href="#faq1_7">1.7 How can I GZip or Bzip a dump or a
    <abbr title="comma separated values">CSV</abbr> export? It does not seem to
    work.</a></h4>

<p> These features are based on the <tt>gzencode()</tt> and <tt>bzcompress()</tt>
    PHP functions to be more independent of the platform (Unix/Windows, Safe Mode
    or not, and so on). So, you must have Zlib/Bzip2
    support (<tt>--with-zlib</tt> and <tt>--with-bz2</tt>).<br /></p>

<h4 id="faq1_8">
    <a href="#faq1_8">1.8 I cannot insert a text file in a table, and I get
    an error about safe mode being in effect.</a></h4>

<p> Your uploaded file is saved by PHP in the &quot;upload dir&quot;, as
    defined in <i>php.ini</i> by the variable <tt>upload_tmp_dir</tt> (usually
    the system default is <i>/tmp</i>).<br />
    We recommend the following setup for Apache servers running in safe mode,
    to enable uploads of files while being reasonably secure:</p>

<ul><li>create a separate directory for uploads: <tt>mkdir /tmp/php</tt></li>
    <li>give ownership to the Apache server's user.group:
        <tt>chown apache.apache /tmp/php</tt></li>
    <li>give proper permission: <tt>chmod 600 /tmp/php</tt></li>
    <li>put <tt>upload_tmp_dir = /tmp/php</tt> in <i>php.ini</i></li>
    <li>restart Apache</li>
</ul>

<h4 id="faq1_9">
    <a href="#faq1_9">1.9 (withdrawn).</a></h4>

<h4 id="faq1_10">
    <a href="#faq1_10">1.10 I'm having troubles when uploading files with
    phpMyAdmin running on a secure server. My browser is Internet Explorer and
    I'm using the Apache server.</a></h4>

<p> As suggested by &quot;Rob M&quot; in the phpWizard forum, add this line to
    your <i>httpd.conf</i>:</p>

    <pre>SetEnvIf User-Agent ".*MSIE.*" nokeepalive ssl-unclean-shutdown</pre>

<p> It seems to clear up many problems between Internet Explorer and SSL.</p>

<h4 id="faq1_11">
    <a href="#faq1_11">1.11 I get an 'open_basedir restriction' while
    uploading a file from the query box.</a></h4>

<p> Since version 2.2.4, phpMyAdmin supports servers with open_basedir
    restrictions. However you need to create temporary directory and 
    configure it as <a href="#cfg_TempDir" class="configrule">$cfg['TempDir']</a>.
    The uploaded files will be moved there, and after execution of your
    <abbr title="structured query language">SQL</abbr> commands, removed.</p>

<h4 id="faq1_12">
    <a href="#faq1_12">1.12 I have lost my MySQL root password, what can I do?</a></h4>

<p> The MySQL manual explains how to
    <a href="http://dev.mysql.com/doc/mysql/en/resetting-permissions.html">
    reset the permissions</a>.</p>

<h4 id="faq1_13">
    <a href="#faq1_13">1.13 (withdrawn).</a></h4>

<h4 id="faq1_14">
    <a href="#faq1_14">1.14 (withdrawn).</a></h4>

<h4 id="faq1_15">
    <a href="#faq1_15">1.15 I have problems with <i>mysql.user</i> column names.</a>
</h4>

<p> In previous MySQL versions, the <tt>User</tt> and <tt>Password</tt>columns 
    were named <tt>user</tt> and <tt>password</tt>. Please modify your column 
    names to align with current standards.</p>

<h4 id="faq1_16">
    <a href="#faq1_16">1.16 I cannot upload big dump files (memory,
    <abbr title="HyperText Transfer Protocol">HTTP</abbr> or timeout problems).</a>
</h4>

<p> Starting with version 2.7.0, the import engine has been re&#8211;written and these
    problems should not occur. If possible, upgrade your phpMyAdmin to the latest version
    to take advantage of the new import features.</p>

<p> The first things to check (or ask your host provider to check) are the
    values of <tt>upload_max_filesize</tt>, <tt>memory_limit</tt> and
    <tt>post_max_size</tt> in the <i>php.ini</i> configuration file.
    All of these three settings limit the maximum size of data that can be
    submitted and handled by PHP. One user also said that
    <tt>post_max_size</tt>
    and <tt>memory_limit</tt> need to be larger than <tt>upload_max_filesize</tt>.<br /> <br />

    There exist several workarounds if your upload is too big or your
    hosting provider is unwilling to change the settings:</p>

<ul><li>Look at the <a href="#cfg_UploadDir" class="configrule">$cfg['UploadDir']</a>
        feature. This allows one to
        upload a file to the server via scp, ftp, or your favorite file transfer
        method. PhpMyAdmin is then able to import the files from the temporary
        directory. More information is available in the <a href="#config">Configuration
        section</a> of this document.</li>
    <li>Using a utility (such as <a href="http://www.ozerov.de/bigdump.php">
        BigDump</a>) to split the files before uploading. We cannot support this
        or any third party applications, but are aware of users having success
        with it.</li>
    <li>If you have shell (command line) access, use MySQL to import the files
        directly. You can do this by issuing the &quot;source&quot; command from
        within MySQL: <tt>source <i>filename.sql</i></tt>.</li>
</ul>

<h4 id="faq1_17">
    <a id="faqmysqlversions" href="#faq1_17">1.17 Which MySQL versions does phpMyAdmin
    support?</a></h4>

<p> Since phpMyAdmin 3.0.x, only MySQL 5.0.1 and newer are supported. For 
    older MySQL versions, you need to use the latest 2.x branch. phpMyAdmin can 
    connect to your MySQL server using PHP's classic
    <a href="http://php.net/mysql">MySQL extension</a> as well as the
    <a href="http://php.net/mysqli">improved MySQL extension (MySQLi)</a> that
    is available in PHP 5.0. The latter one should be used unless you have a
    good reason not to do so.<br />
    When compiling PHP, we strongly recommend that you manually link the MySQL
    extension of your choice to a MySQL client library of at least the same
    minor version since the one that is bundled with some PHP distributions is
    rather old and might cause problems <a href="#faq1_17a">
        (see <abbr title="Frequently Asked Questions">FAQ</abbr> 1.17a)</a>.<br /><br />
    <a href="http://mariadb.org/">MariaDB</a> is also supported
    (versions 5.1 and 5.2 were tested).<br /><br />
    Since phpMyAdmin 3.5 <a href="http://www.drizzle.org/">Drizzle</a> is supported.
    </p>

<h5 id="faq1_17a">
    <a href="#faq1_17a">1.17a I cannot connect to the MySQL server. It always returns the error
    message, &quot;Client does not support authentication protocol requested
    by server; consider upgrading MySQL client&quot;</a></h5>

<p> You tried to access MySQL with an old MySQL client library. The version of
    your MySQL client library can be checked in your phpinfo() output.
    In general, it should have at least the same minor version as your server
    - as mentioned in <a href="#faq1_17">
    <abbr title="Frequently Asked Questions">FAQ</abbr> 1.17</a>.<br /><br />

    This problem is generally caused by using MySQL version 4.1 or newer. MySQL
    changed the authentication hash and your PHP is trying to use the old method.
    The proper solution is to use the <a href="http://www.php.net/mysqli">mysqli extension</a>
    with the proper client library to match your MySQL installation. Your
    chosen extension is specified in <a href="#cfg_Servers_extension" class="configrule">$cfg['Servers'][$i]['extension']</a>.
    More information (and several workarounds) are located in the
    <a href="http://dev.mysql.com/doc/mysql/en/old-client.html">MySQL Documentation</a>.
</p>

<h4 id="faq1_18">
    <a href="#faq1_18">1.18 (withdrawn).</a></h4>

<h4 id="faq1_19">
    <a href="#faq1_19">1.19 I can't run the &quot;display relations&quot; feature because the
    script seems not to know the font face I'm using!</a></h4>

<p> The &quot;FPDF&quot; library we're using for this feature requires some
    special files to use font faces.<br />
    Please refers to the <a href="http://www.fpdf.org/">FPDF manual</a> to build
    these files.</p>

<h4 id="faqmysql">
    <a href="#faqmysql">1.20 I receive the error &quot;cannot load MySQL extension, please
    check PHP Configuration&quot;.</a></h4>

<p> To connect to a MySQL server, PHP needs a set of MySQL functions called
    &quot;MySQL extension&quot;. This extension may be part of the PHP
    distribution (compiled-in), otherwise it needs to be loaded dynamically. Its
    name is probably <i>mysql.so</i> or <i>php_mysql.dll</i>. phpMyAdmin tried
    to load the extension but failed.<br /><br />

    Usually, the problem is solved by installing a software package called
    &quot;PHP-MySQL&quot; or something similar.</p>

<h4 id="faq1_21">
    <a href="#faq1_21">1.21 I am running the
    <abbr title="Common Gateway Interface">CGI</abbr> version of PHP under Unix,
    and I cannot log in using cookie auth.</a></h4>

<p> In <i>php.ini</i>, set <tt>mysql.max_links</tt> higher than 1.</p>

<h4 id="faq1_22">
    <a href="#faq1_22">1.22 I don't see the &quot;Location of text file&quot; field,
    so I cannot upload.</a></h4>

<p> This is most likely because in <i>php.ini</i>, your <tt>file_uploads</tt>
    parameter is not set to &quot;on&quot;.</p>

<h4 id="faq1_23">
    <a href="#faq1_23">1.23 I'm running MySQL on a Win32 machine. Each time I create
    a new table the table and column names are changed to lowercase!</a></h4>

<p> This happens because the MySQL directive <tt>lower_case_table_names</tt>
    defaults to 1 (<tt>ON</tt>) in the Win32 version of MySQL. You can change
    this behavior by simply changing the directive to 0 (<tt>OFF</tt>):<br />
    Just edit your <tt>my.ini</tt> file that should be located in your Windows
    directory and add the following line to the group [mysqld]:</p>

<pre>set-variable = lower_case_table_names=0</pre>

<p> Next, save the file and restart the MySQL service. You can always check the
    value of this directive using the query</p>

<pre>SHOW VARIABLES LIKE 'lower_case_table_names';</pre>

<h4 id="faq1_24">
    <a href="#faq1_24">1.24 (withdrawn).</a></h4>

<h4 id="faq1_25">
    <a href="#faq1_25">1.25 I am running Apache with mod_gzip-1.3.26.1a on Windows XP,
    and I get problems, such as undefined variables when I run a
    <abbr title="structured query language">SQL</abbr> query.</a></h4>

<p> A tip from Jose Fandos: put a comment on the following two lines
    in httpd.conf, like this:</p>

<pre>
# mod_gzip_item_include file \.php$
# mod_gzip_item_include mime "application/x-httpd-php.*"
</pre>

<p> as this version of mod_gzip on Apache (Windows) has problems handling
    PHP scripts. Of course you have to restart Apache.</p>

<h4 id="faq1_26">
    <a href="#faq1_26">1.26 I just installed phpMyAdmin in my document root of
    <abbr title="Internet Information Services">IIS</abbr> but
    I get the error &quot;No input file specified&quot; when trying to
    run phpMyAdmin.</a></h4>

<p> This is a permission problem. Right-click on the phpmyadmin folder
    and choose properties. Under the tab Security, click on &quot;Add&quot;
    and select the user &quot;IUSR_machine&quot; from the list. Now set his
    permissions and it should work.</p>

<h4 id="faq1_27">
    <a href="#faq1_27">1.27 I get empty page when I want to view huge page (eg.
    db_structure.php with plenty of tables).</a></h4>

<p> This is a <a href="http://bugs.php.net/21079">PHP bug</a> that occur when
    GZIP output buffering is enabled. If you turn off it (by
    <a href="#cfg_OBGzip" class="configrule">$cfg['OBGzip'] = false</a>
    in <i>config.inc.php</i>), it should work. This bug will be fixed in
    PHP&nbsp;5.0.0.</p>

<h4 id="faq1_28">
    <a href="#faq1_28">1.28 My MySQL server sometimes refuses queries and returns the
    message 'Errorcode: 13'. What does this mean?</a></h4>

<p> This can happen due to a MySQL bug when having database / table names with
    upper case characters although <tt>lower_case_table_names</tt> is set to 1.
    To fix this, turn off this directive, convert all database and table names
    to lower case and turn it on again. Alternatively, there's a bug-fix
    available starting with MySQL&nbsp;3.23.56 / 4.0.11-gamma.</p>

<h4 id="faq1_29">
    <a href="#faq1_29">1.29 When I create a table or modify a column, I get an error
    and the columns are duplicated.</a></h4>

<p> It is possible to configure Apache in such a way that PHP has problems
    interpreting .php files.</p>

<p> The problems occur when two different (and conflicting) set of directives
    are used:</p>

<pre>
SetOutputFilter PHP
SetInputFilter PHP
</pre>

<p> and</p>

<pre>AddType application/x-httpd-php .php</pre>

<p> In the case we saw, one set of directives was in
    <tt>/etc/httpd/conf/httpd.conf</tt>, while
    the other set was in <tt>/etc/httpd/conf/addon-modules/php.conf</tt>.<br />
    The recommended way is with <tt>AddType</tt>, so just comment out
    the first set of lines and restart Apache:</p>

<pre>
#SetOutputFilter PHP
#SetInputFilter PHP
</pre>

<h4 id="faq1_30">
    <a href="#faq1_30">1.30 I get the error &quot;navigation.php: Missing hash&quot;.</a></h4>

<p> This problem is known to happen when the server is running Turck MMCache
    but upgrading MMCache to version 2.3.21 solves the problem.</p>

<h4 id="faq1_31">
    <a href="#faq1_31">1.31 Does phpMyAdmin support php5?</a></h4>

<p>Yes.</p>
<p>
    Since release 3.0 only PHP 5.2 and newer. For older PHP versions 2.9 branch
    is still maintained.
</p>

<h4 id="faq1_32">
    <a href="#faq1_32">1.32 Can I use <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication with <abbr title="Internet Information Services">IIS</abbr>?</a></h4>

<p> Yes. This procedure was tested with phpMyAdmin 2.6.1, PHP 4.3.9 in <abbr title="Internet Server Application Programming Interface">ISAPI</abbr>
    mode under <abbr title="Internet Information Services">IIS</abbr> 5.1.</p>

<ol><li>In your <tt>php.ini</tt> file, set <tt>cgi.rfc2616_headers = 0</tt></li>
    <li>In <tt>Web Site Properties -&gt; File/Directory Security -&gt; Anonymous
        Access</tt> dialog box, check the <tt>Anonymous access</tt> checkbox and
        uncheck any other checkboxes (i.e. uncheck <tt>Basic authentication</tt>,
        <tt>Integrated Windows authentication</tt>, and <tt>Digest</tt> if it's
        enabled.) Click <tt>OK</tt>.</li>
    <li>In <tt>Custom Errors</tt>, select the range of <tt>401;1</tt> through
        <tt>401;5</tt> and click the <tt>Set to Default</tt> button.</li>
</ol>

<h4 id="faq1_33">
    <a href="#faq1_33">1.33 (withdrawn).</a></h4>

<h4 id="faq1_34">
    <a href="#faq1_34">1.34 Can I access directly to database or table pages?</a></h4>

<p> Yes. Out of the box, you can use <abbr title="Uniform Resource Locator">URL</abbr>s like
http://server/phpMyAdmin/index.php?server=X&amp;db=database&amp;table=table&amp;target=script. For <tt>server</tt> you use the server number which refers to
the order of the server paragraph in <tt>config.inc.php</tt>.
    Table and script parts are optional. If you want
    http://server/phpMyAdmin/database[/table][/script] <abbr title="Uniform Resource Locator">URL</abbr>s, you need to do
    some configuration. Following lines apply only for <a
    href="http://httpd.apache.org">Apache</a> web server. First make sure,
    that you have enabled some features within global configuration. You need
    <code>Options FollowSymLinks</code> and <code>AllowOverride
    FileInfo</code> enabled for directory where phpMyAdmin is installed and
    you need mod_rewrite to be enabled. Then you just need to create following
    <a href="#glossary"><i>.htaccess</i></a> file in root folder of phpMyAdmin installation
    (don't forget to change directory name inside of it):</p>

<pre>
RewriteEngine On
RewriteBase /path_to_phpMyAdmin
RewriteRule ^([a-zA-Z0-9_]+)/([a-zA-Z0-9_]+)/([a-z_]+\.php)$ index.php?db=$1&amp;table=$2&amp;target=$3 [R]
RewriteRule ^([a-zA-Z0-9_]+)/([a-z_]+\.php)$ index.php?db=$1&amp;target=$2 [R]
RewriteRule ^([a-zA-Z0-9_]+)/([a-zA-Z0-9_]+)$ index.php?db=$1&amp;table=$2 [R]
RewriteRule ^([a-zA-Z0-9_]+)$ index.php?db=$1 [R]
</pre>

<h4 id="faq1_35">
    <a href="#faq1_35">1.35 Can I use <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication with Apache <abbr title="Common Gateway Interface">CGI</abbr>?</a></h4>

<p> Yes. However you need to pass authentication variable to <abbr title="Common Gateway Interface">CGI</abbr> using
    following rewrite rule:</p>

<pre>
RewriteEngine On
RewriteRule .* - [E=REMOTE_USER:%{HTTP:Authorization},L]
</pre>

<h4 id="faq1_36">
    <a href="#faq1_36">1.36 I get an error &quot;500 Internal Server Error&quot;.</a>
</h4>
<p>
    There can be many explanations to this and a look at your server's
    error log file might give a clue.
</p>

<h4 id="faq1_37">
    <a href="#faq1_37">1.37 I run phpMyAdmin on cluster of different machines and
    password encryption in cookie auth doesn't work.</a></h4>

<p> If your cluster consist of different architectures, PHP code used for
    encryption/decryption won't work correct. This is caused by use of
    pack/unpack functions in code. Only solution is to use mcrypt extension
    which works fine in this case.</p>

<h4 id="faq1_38">
    <a href="#faq1_38">1.38 Can I use phpMyAdmin on a server on which Suhosin is enabled?</a></h4>

<p> Yes but the default configuration values of Suhosin are known to cause 
    problems with some operations, for example editing a table with many
    columns and no primary key or with textual primary key.
</p>
<p>
    Suhosin configuration might lead to malfunction in some cases and it can
    not be fully avoided as phpMyAdmin is kind of application which needs to
    transfer big amounts of columns in single HTTP request, what is something
    what Suhosin tries to prevent. Generally all
    <code>suhosin.request.*</code>, <code>suhosin.post.*</code> and
    <code>suhosin.get.*</code> directives can have negative effect on
    phpMyAdmin usability. You can always find in your error logs which limit
    did cause dropping of variable, so you can diagnose the problem and adjust
    matching configuration variable.
</p>
<p>
    The default values for most Suhosin configuration options will work in most 
    scenarios, however you might want to adjust at least following parameters:
</p>

<ul>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.request.max_vars">suhosin.request.max_vars</a> should be increased (eg. 2048)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.post.max_vars">suhosin.post.max_vars</a> should be increased (eg. 2048)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.request.max_array_index_length">suhosin.request.max_array_index_length</a> should be increased (eg. 256)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.post.max_array_index_length">suhosin.post.max_array_index_length</a> should be increased (eg. 256)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.request.max_totalname_length">suhosin.request.max_totalname_length</a> should be increased (eg. 8192)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.post.max_totalname_length">suhosin.post.max_totalname_length</a> should be increased (eg. 8192)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.get.max_value_length">suhosin.get.max_value_length</a> should be increased (eg. 1024)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#suhosin.sql.bailout_on_error">suhosin.sql.bailout_on_error</a> needs to be disabled (the default)</li>
    <li><a href="http://www.hardened-php.net/suhosin/configuration.html#logging_configuration">suhosin.log.*</a> should not include <abbr title="structured query language">SQL</abbr>, otherwise you get big slowdown</li>
</ul>

    <p>
        You can also disable the warning using the <a href="#cfg_SuhosinDisableWarning">
        <tt>SuhosinDisableWarning</tt> directive</a>.
    </p>

<h4 id="faq1_39">
    <a href="#faq1_39">1.39 When I try to connect via https, I can log in, 
    but then my connection is redirected back to http. What can cause this 
    behavior?</a></h4>

<p> Be sure that you have enabled <tt>SSLOptions</tt> and <tt>StdEnvVars</tt>
in your Apache configuration. See <a href="http://httpd.apache.org/docs/2.0/mod/mod_ssl.html#ssloptions">http://httpd.apache.org/docs/2.0/mod/mod_ssl.html#ssloptions</a>.</p>

<h4 id="faq1_40">
    <a href="#faq1_40">1.40 When accessing phpMyAdmin via an Apache reverse proxy, cookie login does not work.</a></h4>

<p>To be able to use cookie auth Apache must know that it has to rewrite the set-cookie headers.<br />
    Example from the Apache 2.2 documentation:</p>
<pre>
ProxyPass /mirror/foo/ http://backend.example.com/
ProxyPassReverse /mirror/foo/ http://backend.example.com/
ProxyPassReverseCookieDomain backend.example.com public.example.com 
ProxyPassReverseCookiePath / /mirror/foo/ 
</pre>

<p>Note: if the backend url looks like http://host/~user/phpmyadmin,
    the tilde (~) must be url encoded as %7E in the ProxyPassReverse* lines.
    This is not specific to phpmyadmin, it's just the behavior of Apache.
    </p>

<pre>
ProxyPass /mirror/foo/ http://backend.example.com/~user/phpmyadmin
ProxyPassReverse /mirror/foo/
http://backend.example.com/%7Euser/phpmyadmin
ProxyPassReverseCookiePath /%7Euser/phpmyadmin /mirror/foo
</pre>

    <p>See <a href="http://httpd.apache.org/docs/2.2/mod/mod_proxy.html">http://httpd.apache.org/docs/2.2/mod/mod_proxy.html</a>
    for more details.</p>

<h4 id="faq1_41">
    <a href="#faq1_41">1.41 When I view a database and ask to see its
           privileges, I get an error about an unknown column.</a></h4>

<p> The MySQL server's privilege tables are not up to date, you need to run
the <tt>mysql_upgrade</tt> command on the server.</p>

<h4 id="faq1_42">
    <a href="#faq1_42">1.42 How can I prevent robots from accessing phpMyAdmin?</a></h4>

<p>You can add various rules to <a href="#glossary"><i>.htaccess</i></a> to filter access
based on user agent field. This is quite easy to circumvent, but could prevent at least
some robots accessing your installation.</p>

<pre>
RewriteEngine on

# Allow only GET and POST verbs
RewriteCond %{REQUEST_METHOD} !^(GET|POST)$ [NC,OR]

# Ban Typical Vulnerability Scanners and others
# Kick out Script Kiddies
RewriteCond %{HTTP_USER_AGENT} ^(java|curl|wget).* [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^.*(libwww-perl|curl|wget|python|nikto|wkito|pikto|scan|acunetix).* [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^.*(winhttp|HTTrack|clshttp|archiver|loader|email|harvest|extract|grab|miner).* [NC,OR]

# Ban Search Engines, Crawlers to your administrative panel
# No reasons to access from bots
# Ultimately Better than the useless robots.txt
# Did google respect robots.txt?
# Try google: intitle:phpMyAdmin intext:"Welcome to phpMyAdmin *.*.*" intext:"Log in" -wiki -forum -forums -questions intext:"Cookies must be enabled"
RewriteCond %{HTTP_USER_AGENT} ^.*(AdsBot-Google|ia_archiver|Scooter|Ask.Jeeves|Baiduspider|Exabot|FAST.Enterprise.Crawler|FAST-WebCrawler|www\.neomo\.de|Gigabot|Mediapartners-Google|Google.Desktop|Feedfetcher-Google|Googlebot|heise-IT-Markt-Crawler|heritrix|ibm.com\cs/crawler|ICCrawler|ichiro|MJ12bot|MetagerBot|msnbot-NewsBlogs|msnbot|msnbot-media|NG-Search|lucene.apache.org|NutchCVS|OmniExplorer_Bot|online.link.validator|psbot0|Seekbot|Sensis.Web.Crawler|SEO.search.Crawler|Seoma.\[SEO.Crawler\]|SEOsearch|Snappy|www.urltrends.com|www.tkl.iis.u-tokyo.ac.jp/~crawler|SynooBot|crawleradmin.t-info@telekom.de|TurnitinBot|voyager|W3.SiteSearch.Crawler|W3C-checklink|W3C_Validator|www.WISEnutbot.com|yacybot|Yahoo-MMCrawler|Yahoo\!.DE.Slurp|Yahoo\!.Slurp|YahooSeeker).* [NC]
RewriteRule .* - [F]
</pre>



<h3 id="faqconfig">Configuration</h3>

<h4 id="faq2_1">
    <a href="#faq2_1">2.1 The error message &quot;Warning: Cannot add header information -
    headers already sent by ...&quot; is displayed, what's the problem?</a></h4>

<p> Edit your <i>config.inc.php</i> file and ensure there is nothing
    (I.E. no blank lines, no spaces, no characters...) neither before the
    <tt>&lt;?php</tt> tag at the beginning, neither after the <tt>?&gt;</tt>
    tag at the end. We also got a report from a user under
    <abbr title="Internet Information Services">IIS</abbr>, that used
    a zipped distribution kit: the file <tt>libraries/Config.class.php</tt>
    contained an end-of-line character (hex 0A) at the end; removing this character
    cleared his errors.</p>

<h4 id="faq2_2">
    <a href="#faq2_2">2.2 phpMyAdmin can't connect to MySQL. What's wrong?</a></h4>

<p> Either there is an error with your PHP setup or your username/password is
    wrong. Try to make a small script which uses mysql_connect and see if it
    works. If it doesn't, it may be you haven't even compiled MySQL support
    into PHP.</p>

<h4 id="faq2_3">
    <a href="#faq2_3">2.3 The error message &quot;Warning: MySQL Connection Failed: Can't
    connect to local MySQL server through socket '/tmp/mysql.sock'
    (111) ...&quot; is displayed. What can I do?</a></h4>

<p> For RedHat users, Harald Legner suggests this on the mailing list:</p>

<p> On my RedHat-Box the socket of MySQL is <i>/var/lib/mysql/mysql.sock</i>.
    In your <i>php.ini</i> you will find a line</p>

<pre>mysql.default_socket = /tmp/mysql.sock</pre>

<p> change it to</p>

<pre>mysql.default_socket = /var/lib/mysql/mysql.sock</pre>

<p> Then restart apache and it will work.</p>

<p> Here is a fix suggested by Brad Ummer:</p>

<ul><li>First, you need to determine what socket is being used by MySQL.<br />
        To do this, telnet to your server and go to the MySQL bin directory. In
        this directory there should be a file named <i>mysqladmin</i>. Type
        <tt>./mysqladmin variables</tt>, and this should give you a bunch of
        info about your MySQL server, including the socket
        (<i>/tmp/mysql.sock</i>, for example).</li>
    <li>Then, you need to tell PHP to use this socket.<br /> To do this in
        phpMyAdmin, you need to complete the  socket information in the
        <i>config.inc.php</i>.<br />
        For example:
        <a href="#cfg_Servers_socket" class="configrule">
        $cfg['Servers'][$i]['socket']&nbsp;=&nbsp;'/tmp/mysql.sock';</a>
        <br /><br />

        Please also make sure that the permissions of this file allow to be readable
        by your webserver (i.e. '0755').</li>
</ul>

<p> Have also a look at the
    <a href="http://dev.mysql.com/doc/en/can-not-connect-to-server.html">
         corresponding section of the MySQL documentation</a>.</p>

<h4 id="faq2_4">
    <a href="#faq2_4">2.4 Nothing is displayed by my browser when I try to run phpMyAdmin,
    what can I do?</a></h4>

<p> Try to set the <a href="#cfg_OBGzip" class="configrule">$cfg['OBGZip']</a>
    directive to <tt>FALSE</tt> in the phpMyAdmin configuration file. It helps
    sometime.<br />
    Also have a look at your PHP version number: if it contains &quot;b&quot; or &quot;alpha&quot;
    it means you're running a testing version of PHP. That's not a so good idea,
    please upgrade to a plain revision.</p>

<h4 id="faq2_5">
    <a href="#faq2_5">2.5 Each time I want to insert or change a row or drop a database
    or a table, an error 404 (page not found) is displayed or, with <abbr title="HyperText Transfer Protocol">HTTP</abbr> or
    cookie authentication, I'm asked to log in again. What's wrong?</a></h4>

<p> Check the value you set for the
    <a href="#cfg_PmaAbsoluteUri" class="configrule">$cfg['PmaAbsoluteUri']</a>
    directive in the phpMyAdmin configuration file.</p>

<h4 id="faq2_6">
    <a href="#faq2_6">2.6 I get an &quot;Access denied for user: 'root@localhost' (Using
    password: YES)&quot;-error when trying to access a MySQL-Server on a
    host which is port-forwarded for my localhost.</a></h4>

<p> When you are using a port on your localhost, which you redirect via
    port-forwarding to another host, MySQL is not resolving the localhost
    as expected.<br />
    Erik Wasser explains: The solution is: if your host is &quot;localhost&quot;
    MySQL (the command line tool <code>mysql</code> as well) always tries to use the socket
    connection for speeding up things. And that doesn't work in this configuration
    with port forwarding.<br />
    If you enter "127.0.0.1" as hostname, everything is right and MySQL uses the
    <abbr title="Transmission Control Protocol">TCP</abbr> connection.</p>

<h4 id="faqthemes"><a href="#faqthemes">2.7 Using and creating themes</a></h4>

<p> Themes are configured with
    <a href="#cfg_ThemePath" class="configrule">$cfg['ThemePath']</a>,
    <a href="#cfg_ThemeManager" class="configrule">$cfg['ThemeManager']</a> and
    <a href="#cfg_ThemeDefault" class="configrule">$cfg['ThemeDefault']</a>.<br />
    <br />
    Under <a href="#cfg_ThemePath" class="configrule">$cfg['ThemePath']</a>, you
    should not delete the directory &quot;original&quot; or its underlying
    structure, because this is the system theme used by phpMyAdmin.
    &quot;original&quot; contains all images and styles, for backwards
    compatibility and for all themes that would not include images or css-files.
    <br /><br />

    If <a href="#cfg_ThemeManager" class="configrule">$cfg['ThemeManager']</a>
    is enabled, you can select your favorite theme on the main page. Your
    selected theme will be stored in a cookie.<br /><br /></p>

<p> To create a theme:</p>

<ul><li>make a new subdirectory (for example &quot;your_theme_name&quot;) under
        <a href="#cfg_ThemePath" class="configrule">$cfg['ThemePath']</a>
        (by default <tt>themes</tt>)</li>
    <li>copy the files and directories from &quot;original&quot; to
        &quot;your_theme_name&quot;</li>
    <li>edit the css-files in &quot;your_theme_name/css&quot;</li>
    <li>put your new images in &quot;your_theme_name/img&quot;</li>
    <li>edit <tt>layout.inc.php</tt> in &quot;your_theme_name&quot;</li>
    <li>edit <tt>info.inc.php</tt> in &quot;your_theme_name&quot; to
        contain your chosen theme name, that will be visible in user interface</li>
    <li>make a new screenshot of your theme and save it under
        &quot;your_theme_name/screen.png&quot;</li>
</ul>

<p> In theme directory there is file <tt>info.inc.php</tt> which contains
    theme verbose name, theme generation and theme version. These versions and
    generations are enumerated from 1 and do not have any direct dependence on
    phpMyAdmin version. Themes within same generation should be backwards
    compatible - theme with version 2 should work in phpMyAdmin requiring
    version 1. Themes with different generation are incompatible.</p>

<p> If you do not want to use your own symbols and buttons, remove the
    directory &quot;img&quot; in &quot;your_theme_name&quot;. phpMyAdmin will
    use the default icons and buttons (from the system-theme &quot;original&quot;).
</p>

<h4 id="faqmissingparameters">
    <a href="#faqmissingparameters">2.8 I get &quot;Missing parameters&quot; errors,
    what can I do?</a></h4>

<p> Here are a few points to check:</p>

<ul><li>In <tt>config.inc.php</tt>, try to leave the
        <a href="#cfg_PmaAbsoluteUri" class="configrule">$cfg['PmaAbsoluteUri']</a>
        directive empty. See also
        <a href="#faq4_7"><abbr title="Frequently Asked Questions">FAQ</abbr> 4.7</a>.
    </li>
    <li>Maybe you have a broken PHP installation or you need to upgrade
        your Zend Optimizer. See
        <a href="http://bugs.php.net/bug.php?id=31134">
        http://bugs.php.net/bug.php?id=31134</a>.
    </li>
    <li>If you are using Hardened PHP with the ini directive <tt>varfilter.max_request_variables</tt>
        set to the default (200) or another low value, you could get this
        error if your table has a high number of columns. Adjust this setting
        accordingly. (Thanks to Klaus Dorninger for the hint).
    </li>
    <li>In the <tt>php.ini</tt> directive <tt>arg_separator.input</tt>, a value
        of &quot;;&quot; will cause this error. Replace it with &quot;&amp;;&quot;.
    </li>
    <li>If you are using <a href="http://www.hardened-php.net/">Hardened-PHP</a>,
       you might want to increase
       <a href="http://www.hardened-php.net/hphp/troubleshooting.html">request limits</a>.
    </li>
    <li>The directory specified in the <tt>php.ini</tt> directive <tt>session.save_path</tt> does not exist or is read-only.
    </li>
</ul>

<h4 id="faq2_9">
    <a href="#faq2_9">2.9 Seeing an upload progress bar</a></h4>

<p> To be able to see a progress bar during your uploads, your server must
have either the <a href="http://pecl.php.net/package/APC">APC</a> extension
    or the <a href="http://pecl.php.net/package/uploadprogress">uploadprogress</a>
    one. Moreover, the JSON extension has to be enabled in your PHP.</p>
    <p> If using APC, you must set <tt>apc.rfc1867</tt> to <tt>on</tt> in your php.ini.</p>

<h3 id="faqlimitations">Known limitations</h3>

<h4 id="login_bug">
    <a href="#login_bug">3.1 When using
    <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication, a user
    who logged out can not log in again in with the same nick.</a></h4>

<p> This is related to the authentication mechanism (protocol) used by
    phpMyAdmin. To bypass this problem: just close all the opened
    browser windows and then go back to phpMyAdmin. You should be able to
    log in again.</p>

<h4 id="faq3_2">
    <a href="#faq3_2">3.2 When dumping a large table in compressed mode, I get a memory
    limit error or a time limit error.</a></h4>

<p> Compressed dumps are built in memory and because of this are limited to
    php's memory limit. For GZip/BZip2 exports this can be overcome since 2.5.4
    using
    <a href="#cfg_CompressOnFly" class="configrule">$cfg['CompressOnFly']</a>
    (enabled by default). Zip exports can not be handled this way, so if you need
    Zip files for larger dump, you have to use another way.</p>

<h4 id="faq3_3">
    <a href="#faq3_3">3.3 With InnoDB tables, I lose foreign key relationships 
    when I rename a table or a column.</a></h4>

<p> This is an InnoDB bug, see <a href="http://bugs.mysql.com/bug.php?id=21704">http://bugs.mysql.com/bug.php?id=21704</a>.</p>

<h4 id="faq3_4">
    <a href="#faq3_4">3.4 I am unable to import dumps I created with the mysqldump tool
    bundled with the MySQL server distribution.</a></h4>

<p> The problem is that older versions of <code>mysqldump</code> created invalid comments like this:</p>

<pre>
-- MySQL dump 8.22
--
-- Host: localhost Database: database
---------------------------------------------------------
-- Server version 3.23.54
</pre>

<p> The invalid part of the code is the horizontal line made of dashes that
    appears once in every dump created with mysqldump. If you want to run your
    dump you have to turn it into valid MySQL. This means, you have to add a
    whitespace after the first two dashes of the line or add a # before it:
    <br />
    <code>
        -- -------------------------------------------------------<br />
    </code>
    or<br />
    <code>
        #---------------------------------------------------------
    </code>
</p>

<h4 id="faq3_5">
    <a href="#faq3_5">3.5 When using nested folders there are some multiple hierarchies
    displayed in a wrong manner?!</a> (<a href="#cfg_LeftFrameTableSeparator"
    class="configrule">$cfg['LeftFrameTableSeparator']</a>)</h4>

<p> Please note that you should not use the separating string multiple times
    without any characters between them, or at the beginning/end of your table
    name. If you have to, think about using another TableSeparator or disabling
    that feature</p>

<h4 id="faq3_6">
    <a href="#faq3_6">3.6 What is currently not supported in phpMyAdmin about InnoDB?</a></h4>

<p> In Relation view, being able to choose a table in another database,
    or having more than one index column in the foreign key.<br /><br/>
    In Query-by-example (Query), automatic generation of the query
    LEFT JOIN from the foreign table.<br /><br/>
</p>

<h4 id="faq3_7">
    <a href="#faq3_7">3.7 I have table with many (100+) columns and when I try to browse table
    I get series of errors like &quot;Warning: unable to parse url&quot;. How
    can this be fixed?</a></h4>
<p>
    Your table neither have a primary key nor an unique one, so we must use a
    long expression to identify this row. This causes problems to parse_url
    function. The workaround is to create a primary or unique key.
    <br />
</p>

<h4 id="faq3_8">
    <a href="#faq3_8">3.8 I cannot use (clickable) HTML-forms in columns where I put
    a MIME-Transformation onto!</a></h4>

<p> Due to a surrounding form-container (for multi-row delete checkboxes), no
    nested forms can be put inside the table where phpMyAdmin displays the results.
    You can, however, use any form inside of a table if keep the parent
    form-container with the target to tbl_row_delete.php and just put your own
    input-elements inside. If you use a custom submit input field, the form will
    submit itself to the displaying page again, where you can validate the
    $HTTP_POST_VARS in a transformation.

    For a tutorial on how to effectively use transformations, see our
    <a href="http://www.phpmyadmin.net/home_page/docs.php">Link section</a>
    on the official phpMyAdmin-homepage.</p>

<h4 id="faq3_9">
    <a href="#faq3_9">3.9 I get error messages when using "--sql_mode=ANSI" for the
    MySQL server</a></h4>

<p> When MySQL is running in ANSI-compatibility mode, there are some major
    differences in how <abbr title="structured query language">SQL</abbr> is
    structured (see <a href="http://dev.mysql.com/doc/mysql/en/ansi-mode.html">
    http://dev.mysql.com/doc/mysql/en/ansi-mode.html</a>). Most important of all,
    the quote-character (") is interpreted as an identifier quote character and
    not as a string quote character, which makes many internal phpMyAdmin
    operations into invalid <abbr title="structured query language">SQL</abbr>
    statements. There is no workaround to this behaviour. News to this item will
    be posted in Bug report
    <a href="https://sourceforge.net/tracker/index.php?func=detail&amp;aid=816858&amp;group_id=23067&amp;atid=377408">#816858</a>
</p>

<h4 id="faq3_10">
    <a href="#faq3_10">3.10 Homonyms and no primary key: When the results of a SELECT display
    more that one column with the same value
    (for example <tt>SELECT lastname from employees where firstname like 'A%'</tt> and two &quot;Smith&quot; values are displayed),
    if I click Edit I cannot be sure that I am editing the intended row.</a></h4>

<p> Please make sure that your table has a primary key, so that phpMyAdmin
    can use it for the Edit and Delete links.</p>

<h4 id="faq3_11">
    <a href="#faq3_11">3.11 The number of rows for InnoDB tables is not correct.</a></h4>

<p> phpMyAdmin uses a quick method to get the row count, and this method
    only returns an approximate count in the case of InnoDB tables. See
    <a href="#cfg_MaxExactCount" class="configrule">$cfg['MaxExactCount']</a> for
    a way to modify those results, but
    this could have a serious impact on performance.</p>

<h4 id="faq3_12">
    <a href="#faq3_12">3.12 (withdrawn).</a></h4>

<h4 id="faq3_13">
    <a href="#faq3_13">3.13 I get an error when entering <tt>USE</tt> followed by a db name
    containing an hyphen.
</a></h4>
<p>
    The tests I have made with MySQL 5.1.49 shows that the
    API does not accept this syntax for the USE command.
</p>

<h4 id="faq3_14">
    <a href="#faq3_14">3.14 I am not able to browse a table when I don't have the right to SELECT one of the columns.</a></h4>
<p>
    This has been a known limitation of phpMyAdmin since the beginning and
    it's not likely to be solved in the future.
</p>

<!-- Begin: Excel import limitations -->

<h4 id="faq3_15">
    <a href="#faq3_15">3.15 (withdrawn).</a></h4>

<h4 id="faq3_16">
    <a href="#faq3_16">3.16 (withdrawn).</a></h4>

<h4 id="faq3_17">
    <a href="#faq3_17">3.17 (withdrawn).</a></h4>

<!-- End: Excel import limitations -->
<!-- Begin: CSV import limitations -->

<h4 id="faq3_18">
    <a href="#faq3_18">3.18 When I import a <abbr title="comma separated values">
    CSV</abbr> file that contains multiple tables, they are lumped together into
    a single table.</a></h4>
<p>
    There is no reliable way to differentiate tables in <abbr title="comma separated values">
    CSV</abbr> format. For the time being, you will have to break apart
    <abbr title="comma separated values">CSV</abbr> files containing multiple tables.
</p>

<!-- End: CSV import limitations -->
<!-- Begin: Import type-detection limitations -->

<h4 id="faq3_19">
    <a href="#faq3_19">3.19 When I import a file and have phpMyAdmin determine the appropriate data structure it only uses int, decimal, and varchar types.</a></h4>
<p>
    Currently, the import type-detection system can only assign these MySQL types to columns. In future, more will likely be added but for the time being 
    you will have to edit the structure to your liking post-import.
    <br /><br />
    Also, you should note the fact that phpMyAdmin will use the size of the largest item in any given column as the column size for the appropriate type. If you 
    know you will be adding larger items to that column then you should manually adjust the column sizes accordingly. This is done for the sake of efficiency.
</p>

<!-- End: Import type-detection limitations -->

<h3 id="faqmultiuser"><abbr title="Internet service provider">ISP</abbr>s, multi-user installations</h3>

<h4 id="faq4_1">
    <a href="#faq4_1">4.1 I'm an <abbr title="Internet service provider">ISP</abbr>. Can I setup one central copy of phpMyAdmin or do I
    need to install it for each customer.
</a></h4>
<p>
    Since version 2.0.3, you can setup a central copy of phpMyAdmin for all
    your users. The development of this feature was kindly sponsored by
    NetCologne GmbH.
    This requires a properly setup MySQL user management and phpMyAdmin
    <abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie authentication. See the install section on
    &quot;Using <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication&quot;.
</p>

<h4 id="faq4_2">
    <a href="#faq4_2">4.2 What's the preferred way of making phpMyAdmin secure against evil
    access.
</a></h4>
<p>
    This depends on your system.<br />
    If you're running a server which cannot be accessed by other people, it's
    sufficient to use the directory protection bundled with your webserver
    (with Apache you can use <a href="#glossary"><i>.htaccess</i></a> files, for example).<br />
    If other people have telnet access to your server, you should use
    phpMyAdmin's <abbr title="HyperText Transfer Protocol">HTTP</abbr> or cookie authentication features.
    <br /><br />
    Suggestions:
</p>
<ul>
    <li>
        Your <i>config.inc.php</i> file should be <tt>chmod 660</tt>.
    </li>
    <li>
        All your phpMyAdmin files should be chown -R phpmy.apache, where phpmy
        is a user whose password is only known to you, and apache is the
        group under which Apache runs.
    </li>
    <li>
        Follow security recommendations for PHP and your webserver.
    </li>
</ul>

<h4 id="faq4_3">
    <a href="#faq4_3">4.3 I get errors about not being able to include a file in
    <i>/lang</i> or in <i>/libraries</i>.
</a></h4>
<p>
    Check <i>php.ini</i>, or ask your sysadmin to check it. The
    <tt>include_path</tt> must contain &quot;.&quot; somewhere in it, and
    <tt>open_basedir</tt>, if used, must contain &quot;.&quot; and
    &quot;./lang&quot; to allow normal operation of phpMyAdmin.
</p>

<h4 id="faq4_4">
    <a href="#faq4_4">4.4 phpMyAdmin always gives &quot;Access denied&quot; when using <abbr title="HyperText Transfer Protocol">HTTP</abbr>
    authentication.
</a></h4>

<p> This could happen for several reasons:</p>

<ul><li><a href="#cfg_Servers_controluser" class="configrule">$cfg['Servers'][$i]['controluser']</a>
        and/or
        <a href="#cfg_Servers_controlpass" class="configrule">$cfg['Servers'][$i]['controlpass']</a>
        are wrong.</li>
    <li>The username/password you specify in the login dialog are invalid.</li>
    <li>You have already setup a security mechanism for the
        phpMyAdmin-directory, eg. a <a href="#glossary"><i>.htaccess</i></a> file. This would interfere with
        phpMyAdmin's authentication, so remove it.</li>
</ul>

<h4 id="faq4_5">
    <a href="#faq4_5">4.5 Is it possible to let users create their own databases?</a></h4>

<p> Starting with 2.2.5, in the user management page, you can enter a wildcard
    database name for a user (for example &quot;joe%&quot;),
    and put the privileges you want.  For example,
    adding <tt>SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER</tt>
    would let a user create/manage his/her database(s).</p>

<h4 id="faq4_6">
    <a href="#faq4_6">4.6 How can I use the Host-based authentication additions?</a></h4>

<p> If you have existing rules from an old <a href="#glossary"><i>.htaccess</i></a> file, you can take them
    and add a username between the <tt>'deny'</tt>/<tt>'allow'</tt> and
    <tt>'from'</tt> strings. Using the username wildcard of <tt>'%'</tt> would
    be a major benefit here if your installation is suited to using it. Then
    you can just add those updated lines into the
    <a href="#cfg_Servers_AllowDeny_rules" class="configrule">
        $cfg['Servers'][$i]['AllowDeny']['rules']</a> array.</p>

<p> If you want a pre-made sample, you can try this fragment. It stops the
    'root' user from logging in from any networks other than the private
    network <abbr title="Internet Protocol">IP</abbr> blocks.</p>

<pre>
//block root from logging in except from the private networks
$cfg['Servers'][$i]['AllowDeny']['order'] = 'deny,allow';
$cfg['Servers'][$i]['AllowDeny']['rules'] = array(
    'deny root from all',
    'allow root from localhost',
    'allow root from 10.0.0.0/8',
    'allow root from 192.168.0.0/16',
    'allow root from 172.16.0.0/12',
    );
</pre>

<h4 id="faq4_7">
    <a href="#faq4_7">4.7 Authentication window is displayed more than once, why?</a></h4>

<p> This happens if you are using a <abbr title="Uniform Resource Locator">URL</abbr> to start phpMyAdmin which is
    different than the one set in your
    <a href="#cfg_PmaAbsoluteUri" class="configrule">$cfg['PmaAbsoluteUri']</a>.
    For example, a missing &quot;www&quot;, or entering with an <abbr title="Internet Protocol">IP</abbr> address
    while a domain name is defined in the config file.</p>

<h4 id="faq4_8">
    <a href="#faq4_8">4.8 Which parameters can I use in the URL that starts phpMyAdmin?</a></h4>

<p>When starting phpMyAdmin, you can use the <tt>db</tt>, <tt>pma_username</tt>, <tt>pma_password</tt> and <tt>server</tt> parameters. This last one can contain either the numeric host index (from <tt>$i</tt> of the configuration file) or one of the host names present in the configuration file. Using <tt>pma_username</tt> and <tt>pma_password</tt> has been tested along with the usage of 'cookie' <tt>auth_type</tt>.</p>

<h3 id="faqbrowsers">Browsers or client <abbr title="operating system">OS</abbr></h3>

<h4 id="faq5_1">
    <a href="#faq5_1">5.1 I get an out of memory error, and my controls are non-functional,
    when trying to create a table with more than 14 columns.
</a></h4>
<p>
    We could reproduce this problem only under Win98/98SE. Testing under
    WinNT4 or Win2K, we could easily create more than 60 columns.
    <br />
    A workaround is to create a smaller number of columns, then come back to
    your table properties and add the other columns.
</p>

<h4 id="faq5_2">
    <a href="#faq5_2">5.2 With Xitami 2.5b4, phpMyAdmin won't process form fields.</a></h4>
<p>
    This is not a phpMyAdmin problem but a Xitami known bug: you'll face it
    with each script/website that use forms.<br />
    Upgrade or downgrade your Xitami server.
</p>

<h4 id="faq5_3">
    <a href="#faq5_3">5.3 I have problems dumping tables with Konqueror (phpMyAdmin 2.2.2).</a></h4>
<p>
    With Konqueror 2.1.1: plain dumps, zip and GZip dumps work ok, except that
    the proposed file name for the dump is always 'tbl_dump.php'. Bzip2 dumps
    don't seem to work.<br />

    With Konqueror 2.2.1: plain dumps work; zip dumps are placed into
    the user's temporary directory, so they must be moved before closing
    Konqueror, or else they disappear. GZip dumps give an error message.<br />

    Testing needs to be done for Konqueror 2.2.2.<br />
</p>

<h4 id="faq5_4">
    <a href="#faq5_4">5.4 I can't use the cookie authentication mode because Internet
    Explorer never stores the cookies.
</a></h4>
<p>
    MS Internet Explorer seems to be really buggy about cookies, at least till
    version 6.
</p>

<h4 id="faq5_5">
    <a href="#faq5_5">5.5 In Internet Explorer 5.0, I get JavaScript errors when browsing my
    rows.
</a></h4>
<p>
    Upgrade to at least Internet Explorer 5.5 SP2.<br />
</p>

<h4 id="faq5_6">
    <a href="#faq5_6">5.6 In Internet Explorer 5.0, 5.5 or 6.0, I get an error (like "Page not found")
    when trying to modify a row in a table with many columns, or with a text
    column 
</a></h4>
<p>
    Your table neither have a primary key nor an unique one, so we must use a
    long <abbr title="Uniform Resource Locator">URL</abbr> to identify this row. There is a limit on the length of the <abbr title="Uniform Resource Locator">URL</abbr> in
    those browsers, and this not happen in Netscape, for example. The
    workaround is to create a primary or unique key, or use another browser.
    <br />
</p>

<h4 id="faq5_7">
    <a href="#faq5_7">5.7 I refresh (reload) my browser, and come back to the welcome
    page.
</a></h4>
<p>
    Some browsers support right-clicking into the frame you want to refresh,
    just do this in the right frame.<br />
</p>

<h4 id="faq5_8">
    <a href="#faq5_8">5.8 With Mozilla 0.9.7 I have problems sending a query modified in the
    query box.
</a></h4>
<p>
    Looks like a Mozilla bug: 0.9.6 was OK. We will keep an eye on future
    Mozilla versions.<br />
</p>

<h4 id="faq5_9">
    <a href="#faq5_9">5.9 With Mozilla 0.9.? to 1.0 and Netscape 7.0-PR1 I can't type a
    whitespace in the <abbr title="structured query language">SQL</abbr>-Query edit area: the page scrolls down.
</a></h4>
<p>
    This is a Mozilla bug (see bug #26882 at
    <a href="http://bugzilla.mozilla.org/">BugZilla</a>).<br />
</p>

<h4 id="faq5_10">
    <a href="#faq5_10">5.10 With Netscape 4.75 I get empty rows between each row of data in a
    <abbr title="comma separated values">CSV</abbr> exported file.
</a></h4>
<p>
    This is a known Netscape 4.75 bug: it adds some line feeds when exporting
    data in octet-stream mode. Since we can't detect the specific Netscape
    version, we cannot workaround this bug.
</p>

<h4 id="faq5_11">
    <a href="#faq5_11">5.11 Extended-ASCII characters like German umlauts are displayed
    wrong.</a></h4>

<p> Please ensure that you have set your browser's character set to the one of the
    language file you have selected on phpMyAdmin's start page.
    Alternatively, you can try the auto detection mode that is supported by the
    recent versions of the most browsers.</p>

<h4 id="faq5_12">
    <a href="#faq5_12">5.12 <acronym title="Apple Macintosh">Mac</acronym> <abbr title="operating system">OS</abbr> X: Safari browser changes special characters to
    &quot;?&quot;.</a></h4>

<p> This issue has been reported by a <abbr title="operating system">OS</abbr> X user, who adds that Chimera,
    Netscape and Mozilla do not have this problem.</p>

<h4 id="faq5_13">
    <a href="#faq5_13">5.13 With Internet Explorer 5.5 or 6, and <abbr title="HyperText Transfer Protocol">HTTP</abbr> authentication type,
    I cannot manage two servers: I log in to the first one, then the other one,
    but if I switch back to the first, I have to log in on each operation.</a></h4>

<p> This is a bug in Internet Explorer, other browsers do not behave this way.</p>

<h4 id="faq5_14">
    <a href="#faq5_14">5.14 Using Opera6, I can manage to get to the authentication,
    but nothing happens after that, only a blank screen.</a></h4>

<p> Please upgrade to Opera7 at least.</p>

<h4 id="faq5_15">
    <a href="#faq5_15">5.15 I have display problems with Safari.</a></h4>

<p> Please upgrade to at least version 1.2.3.</p>

<h4 id="faq5_16">
    <a href="#faq5_16">5.16 With Internet Explorer, I get &quot;Access is denied&quot;
    Javascript errors. Or I cannot make phpMyAdmin work under Windows.</a></h4>

<p> Please check the following points:</p>
    <ul><li>Maybe you have defined your <tt>PmaAbsoluteUri</tt> setting
            in <tt>config.inc.php</tt> to an <abbr title="Internet Protocol">IP</abbr>
            address and you are starting
            phpMyAdmin with a <abbr title="Uniform Resource Locator">URL</abbr>
            containing a domain name, or the reverse situation.</li>
        <li>Security settings in IE and/or Microsoft Security Center are
            too high, thus blocking scripts execution.</li>
        <li>The Windows Firewall is blocking Apache and MySQL. You must
            allow <abbr title="HyperText Transfer Protocol">HTTP</abbr> ports
            (80 or 443) and MySQL port (usually 3306)
            in the &quot;in&quot; and &quot;out&quot; directions.</li>
    </ul>

<h4 id="faq5_17">
    <a href="#faq5_17">5.17 With Firefox, I cannot delete rows of data or drop a database.</a></h4>
<p> Many users have confirmed that the Tabbrowser Extensions plugin they
    installed in their Firefox is causing the problem.</p>

<h4 id="faq5_18">
<a href="#faq5_18">5.18 With Konqueror 4.2.x an invalid <tt>LIMIT</tt>
    clause is generated when I browse a table.</a></h4>
<p> This happens only when both of these conditions are met: using the 
    <tt>http</tt> authentication mode and <tt>register_globals</tt> being set 
    to <tt>On</tt> on the server. It seems to be a browser-specific problem; 
    meanwhile use the <tt>cookie</tt> authentication mode.</p>

<h4 id="faq5_19">
<a href="#faq5_19">5.19 I get JavaScript errors in my browser.</a></h4>
<p> Issues have been reported with some combinations of browser extensions. 
To troubleshoot, disable all extensions then clear your browser cache
to see if the problem goes away.</p>

<h3 id="faqusing">Using phpMyAdmin</h3>

<h4 id="faq6_1">
    <a href="#faq6_1">6.1 I can't insert new rows into a table / I can't create a table
    - MySQL brings up a <abbr title="structured query language">SQL</abbr>-error.
</a></h4>
<p>
    Examine the <abbr title="structured query language">SQL</abbr> error with care. Often the problem is caused by
    specifying a wrong column-type.<br />
    Common errors include:
</p>
<ul>
    <li>Using <tt>VARCHAR</tt> without a size argument</li>
    <li>Using <tt>TEXT</tt> or <tt>BLOB</tt> with a size argument</li>
</ul>
<p>
    Also, look at the syntax chapter in the MySQL manual to confirm that your
    syntax is correct.
</p>

<h4 id="faq6_2">
    <a href="#faq6_2">6.2 When I create a table, I set an index for two
        columns and
    phpMyAdmin generates only one index with those two columns.
</a></h4>
<p>
    This is the way to create a multi-columns
    index. If you want two indexes, create the first one when creating the
    table, save, then display the table properties and click the Index link to
    create the other index.
</p>

<h4 id="faq6_3">
    <a href="#faq6_3">6.3 How can I insert a null value into my table?</a></h4>
<p>
    Since version 2.2.3, you have a checkbox for each column that can be null.
    Before 2.2.3, you had to enter &quot;null&quot;, without the quotes, as the
    column's value. Since version 2.5.5, you have to use the checkbox to get
    a real NULL value, so if you enter &quot;NULL&quot; this means you want
    a literal NULL in the column, and not a NULL value (this works in PHP4).
</p>

<h4 id="faq6_4">
    <a href="#faq6_4">6.4 How can I backup my database or table?</a></h4>

<p> Click on a database or table name in the left frame, the properties will be
    displayed.  Then on the menu, click &quot;Export&quot;, you can dump
    the structure, the data, or both. This will generate standard <abbr title="structured query language">SQL</abbr>
    statements that can be used to recreate your database/table.
    <br /><br />
    You will need to choose &quot;Save as file&quot;, so that phpMyAdmin can
    transmit the resulting dump to your station. Depending on your PHP
    configuration, you will see options to compress the dump. See also the
    <a href="#cfg_ExecTimeLimit" class="configrule">$cfg['ExecTimeLimit']</a>
    configuration variable.<br /><br />

    For additional help on this subject, look for the word &quot;dump&quot; in
    this document.</p>

<h4 id="faq6_5">
    <a href="#faq6_5">6.5 How can I restore (upload) my database or table using a dump?
    How can I run a &quot;.sql&quot; file?
</a></h4>

<p> Click on a database name in the left frame, the properties will be
    displayed. Select &quot;Import&quot; from the list
    of tabs in the right&#8211;hand frame (or &quot;<abbr title="structured query language">SQL</abbr>&quot; if your phpMyAdmin
    version is previous to 2.7.0). In the &quot;Location of the text file&quot; section, type in
    the path to your dump filename, or use the Browse button. Then click Go.
    <br /><br />
    With version 2.7.0, the import engine has been re&#8211;written, if possible it is suggested
    that you upgrade to take advantage of the new features.
    <br /><br />
    For additional help on this subject, look for the word &quot;upload&quot;
    in this document.
</p>

<h4 id="faq6_6">
    <a href="#faq6_6">6.6 How can I use the relation table in Query-by-example?</a></h4>

<p> Here is an example with the tables persons, towns and countries, all
    located in the database mydb. If you don't have a <tt>pma_relation</tt>
    table, create it as explained in the configuration section. Then create the
    example tables:</p>

<pre>
CREATE TABLE REL_countries (
    country_code char(1) NOT NULL default '',
    description varchar(10) NOT NULL default '',
    PRIMARY KEY (country_code)
) TYPE=MyISAM;

INSERT INTO REL_countries VALUES ('C', 'Canada');

CREATE TABLE REL_persons (
    id tinyint(4) NOT NULL auto_increment,
    person_name varchar(32) NOT NULL default '',
    town_code varchar(5) default '0',
    country_code char(1) NOT NULL default '',
    PRIMARY KEY (id)
) TYPE=MyISAM;

INSERT INTO REL_persons VALUES (11, 'Marc', 'S', '');
INSERT INTO REL_persons VALUES (15, 'Paul', 'S', 'C');

CREATE TABLE REL_towns (
    town_code varchar(5) NOT NULL default '0',
    description varchar(30) NOT NULL default '',
    PRIMARY KEY (town_code)
) TYPE=MyISAM;

INSERT INTO REL_towns VALUES ('S', 'Sherbrooke');
INSERT INTO REL_towns VALUES ('M', 'Montr&eacute;al');
</pre>

<p> To setup appropriate links and display information:</p>

<ul><li>on table &quot;REL_persons&quot; click Structure, then Relation view</li>
    <li>in Links, for &quot;town_code&quot; choose &quot;REL_towns-&gt;code&quot;</li>
    <li>in Links, for &quot;country_code&quot; choose &quot;REL_countries-&gt;country_code&quot;</li>
    <li>on table &quot;REL_towns&quot; click Structure, then Relation view</li>
    <li>in &quot;Choose column to display&quot;, choose &quot;description&quot;</li>
    <li>repeat the two previous steps for table &quot;REL_countries&quot;</li>
</ul>

<p> Then test like this:</p>

<ul><li>Click on your db name in the left frame</li>
    <li>Choose &quot;Query&quot;</li>
    <li>Use tables: persons, towns, countries</li>
    <li>Click &quot;Update query&quot;</li>
    <li>In the columns row, choose persons.person_name and click the
        &quot;Show&quot; tickbox </li>
    <li>Do the same for towns.description and countries.descriptions in the
        other 2 columns</li>
    <li>Click &quot;Update query&quot; and you will see in the query box that
        the correct joins have been generated</li>
    <li>Click &quot;Submit query&quot;</li>
</ul>

<h4 id="faqdisplay">
    <a href="#faqdisplay">6.7 How can I use the &quot;display column&quot; feature?</a></h4>
<p>
    Starting from the previous example, create the pma_table_info as explained
    in the configuration section, then browse your persons table,
    and move the mouse over a town code or country code.
    <br /><br />
    See also <a href="#faq6_21"><abbr title="Frequently Asked Questions">FAQ</abbr> 6.21</a> for an additional feature that &quot;display column&quot;
    enables: drop-down list of possible values.
</p>

<h4 id="faqpdf">
    <a href="#faqpdf">6.8 How can I produce a <abbr title="Portable Document Format">PDF</abbr> schema of my database?</a></h4>
<p>
    First the configuration variables &quot;relation&quot;,
    &quot;table_coords&quot; and &quot;pdf_pages&quot; have to be filled in.
    <br /><br />
    Then you need to think about your schema layout. Which tables will go on
    which pages?
</p>
<ul>
    <li>Select your database in the left frame.</li>
    <li>Choose &quot;Operations&quot; in the navigation bar at the top.</li>
    <li>Choose &quot;Edit <abbr title="Portable Document Format">PDF</abbr>
        Pages&quot; near the bottom of the page.</li>
    <li>Enter a name for the first <abbr title="Portable Document Format">PDF</abbr>
        page and click Go. If you like, you
        can use the &quot;automatic layout,&quot; which will put all your
        linked tables onto the new page.</li>
    <li>Select the name of the new page (making sure the Edit radio button
        is selected) and click Go.</li>
    <li>Select a table from the list, enter its coordinates and click Save.<br />
        Coordinates are relative; your diagram will
        be automatically scaled to fit the page. When initially placing tables
        on the page, just pick any coordinates -- say, 50x50. After clicking
        Save, you can then use the <a href="#wysiwyg">graphical editor</a> to
        position the element correctly.</li>
    <li>When you'd like to look at your <abbr title="Portable Document Format">PDF</abbr>,
        first be sure to click the Save
        button beneath the list of tables and coordinates, to save any changes
        you made there. Then scroll all the way down, select the
        <abbr title="Portable Document Format">PDF</abbr> options
        you want, and click Go.</li>
    <li>Internet Explorer for Windows may suggest an incorrect filename when
        you try to save a generated <abbr title="Portable Document Format">PDF</abbr>.
        When saving a generated <abbr title="Portable Document Format">PDF</abbr>, be
        sure that the filename ends in &quot;.pdf&quot;, for example
        &quot;schema.pdf&quot;. Browsers on other operating systems, and other
        browsers on Windows, do not have this problem.</li>
</ul>

<h4 id="faq6_9">
    <a href="#faq6_9">6.9 phpMyAdmin is changing the type of one of my
    columns!</a></h4>

<p> No, it's MySQL that is doing
    <a href="http://dev.mysql.com/doc/en/silent-column-changes.html">silent
    column type changing</a>.</p>

<h4 id="underscore">
    <a href="#underscore">6.10 When creating a privilege, what happens with
    underscores in the database name?</a></h4>

<p> If you do not put a backslash before the underscore, this is a wildcard
    grant, and the underscore means &quot;any character&quot;. So, if the
    database name is &quot;john_db&quot;, the user would get rights to john1db,
    john2db ...<br /><br />

    If you put a backslash before the underscore, it means that the database
    name will have a real underscore.</p>

<h4 id="faq6_11">
    <a href="#faq6_11">6.11 What is the curious symbol &oslash; in the
    statistics pages?</a></h4>

<p> It means &quot;average&quot;.</p>

<h4 id="faqexport">
    <a href="#faqexport">6.12 I want to understand some Export options.</a></h4>

<p><b>Structure:</b></p>

<ul><li>&quot;Add DROP TABLE&quot; will add a line telling MySQL to
        <a href="http://dev.mysql.com/doc/mysql/en/drop-table.html">drop the table</a>,
        if it already exists during the import. It does NOT drop the table after
        your export, it only affects the import file.</li>
    <li>&quot;If Not Exists&quot; will only create the table if it doesn't exist.
        Otherwise, you may get an error if the table name exists but has a
        different structure.</li>
    <li>&quot;Add AUTO_INCREMENT value&quot; ensures that AUTO_INCREMENT value
        (if any) will be included in backup.</li>
    <li>&quot;Enclose table and column names with backquotes&quot; ensures that
        column and table names formed with special characters are protected.</li>
    <li>&quot;Add into comments&quot; includes column comments, relations, and MIME
        types set in the pmadb in the dump as
        <abbr title="structured query language">SQL</abbr> comments (<i>/* xxx */</i>).
       </li>
</ul>

<p><b>Data:</b></p>

<ul><li>&quot;Complete inserts&quot; adds the column names on every INSERT
        command, for better documentation (but resulting file is bigger).</li>
    <li>&quot;Extended inserts&quot; provides a shorter dump file by using only
        once the INSERT verb and the table name.</li>
    <li>&quot;Delayed inserts&quot; are best explained in the
        <a href="http://dev.mysql.com/doc/mysql/en/insert-delayed.html">MySQL manual</a>.
       </li>
    <li>&quot;Ignore inserts&quot; treats errors as a warning instead. Again,
        more info is provided in the
        <a href="http://dev.mysql.com/doc/mysql/en/insert.html">MySQL manual</a>,
        but basically with this selected, invalid values are adjusted and
        inserted rather than causing the entire statement to fail.</li>
</ul>

<h4 id="faq6_13">
    <a href="#faq6_13">6.13 I would like to create a database with a dot
    in its name.</a></h4>

<p> This is a bad idea, because in MySQL the syntax &quot;database.table&quot;
    is the normal way to reference a database and table name. Worse, MySQL
    will usually let you create a database with a dot, but then you cannot
    work with it, nor delete it.</p>

<h4 id="faqsqlvalidator">
    <a href="#faqsqlvalidator">6.14 How do I set up the
    <abbr title="structured query language">SQL</abbr> Validator?</a></h4>

<p> 
    To use SQL Validator, you need PHP with 
    <abbr title="Extensible Markup Language">XML</abbr>,
    <abbr title="Perl Compatible Regular Expressions">PCRE</abbr> and
    <abbr title="PHP Extension and Application Repository">PEAR</abbr> support.
    In addition you need a <abbr title="Simple Object Access
    Protocol">SOAP</abbr> support, either as a PHP extension or as a PEAR SOAP
    module.
</p>

<p>
    To install <abbr title="PHP Extension and Application
    Repository">PEAR</abbr> <abbr title="Simple Object Access
    Protocol">SOAP</abbr> module, run <tt>"pear install Net_Socket Net_URL
    HTTP_Request Mail_Mime Net_DIME SOAP"</tt> to get the necessary <abbr
    title="PHP Extension and Application Repository">PEAR</abbr> modules for
    usage.
</p>

<p>
    If you use the Validator, you should be aware that any
    <abbr title="structured query language">SQL</abbr> statement you
    submit will be stored anonymously (database/table/column names,
    strings, numbers replaced with generic values). The Mimer
    <abbr title="structured query language">SQL</abbr>
    Validator itself, is &copy; 2001 Upright Database Technology.
    We utilize it as free SOAP service.
</p>

<h4 id="faq6_15">
    <a href="#faq6_15">6.15 I want to add a BLOB column and put an index on
    it, but MySQL says &quot;BLOB column '...' used in key specification without
    a key length&quot;.</a></h4>

<p> The right way to do this, is to create the column without any indexes,
    then display the table structure and use the &quot;Create an index&quot;
    dialog. On this page, you will be able to choose your BLOB column, and
    set a size to the index, which is the condition to create an index on
    a BLOB column.</p>

<h4 id="faq6_16">
    <a href="#faq6_16">6.16 How can I simply move in page with plenty
    editing fields?</a></h4>

<p> You can use Ctrl+arrows (Option+Arrows in Safari) for moving on most pages
    with many editing fields (table structure changes, row editing, etc.).</p>

<h4 id="faq6_17">
    <a href="#faq6_17">6.17 Transformations: I can't enter my own mimetype!
    WTF is this feature then useful for?</a></h4>

<p> Slow down :). Defining mimetypes is of no use, if you can't put transformations
    on them. Otherwise you could just put a comment on the column. Because entering
    your own mimetype will cause serious syntax checking issues and validation,
    this introduces a high-risk false-user-input situation. Instead you have to
    initialize mimetypes using functions or empty mimetype definitions.<br />
    Plus, you have a whole overview of available mimetypes. Who knows all those
    mimetypes by heart so he/she can enter it at will?</p>

<h4 id="faqbookmark">
    <a href="#faqbookmark">6.18 Bookmarks: Where can I store bookmarks? Why
    can't I see any bookmarks below the query box? What is this variable for?
</a></h4>

<p> Any query you have executed can be stored as a bookmark on the page where the
    results are displayed. You will find a button labeled 'Bookmark this query'
    just at the end of the page.<br />
    As soon as you have stored a bookmark, it is related to the database you run
    the query on. You can now access a bookmark dropdown on each page, the query
    box appears on for that database.<br /><br />

    Since phpMyAdmin 2.5.0 you are also able to store variables for the bookmarks.
    Just use the string <b>/*[VARIABLE]*/</b> anywhere in your query. Everything
    which is put into the <i>value</i> input box on the query box page will
    replace the string &quot;/*[VARIABLE]*/&quot; in your stored query. Just be
    aware of that you HAVE to create a valid query, otherwise your query won't be
    even able to be stored in the database.<br />
    Also remember, that everything else inside the <b>/*[VARIABLE]*/</b> string
    for your query will remain the way it is, but will be stripped of the /**/
    chars. So you can use:<br /><br />

    <code>/*, [VARIABLE] AS myname */</code><br /><br />

    which will be expanded to<br /><br />

    <code>, VARIABLE as myname</code><br /><br />

    in your query, where VARIABLE is the string you entered in the input box. If
    an empty string is provided, no replacements are made.<br /><br />

    A more complex example. Say you have stored this query:<br /><br />
    <code>SELECT Name, Address FROM addresses WHERE 1 /* AND Name LIKE '%[VARIABLE]%' */</code>
    <br /><br />

    Say, you now enter &quot;phpMyAdmin&quot; as the variable for the stored query,
    the full query will be:<br /><br />

    <code>SELECT Name, Address FROM addresses WHERE 1 AND Name LIKE '%phpMyAdmin%'</code>
    <br /><br />

    You can use multiple occurrences of <b>/*[VARIABLE]*/</b> in a single query (that is, multiple occurrences of the <i>same</i> variable).<br />
    <b>NOTE THE ABSENCE OF SPACES</b> inside the &quot;/**/&quot; construct. Any
    spaces inserted there
    will be later also inserted as spaces in your query and may lead to unexpected
    results especially when
    using the variable expansion inside of a &quot;LIKE ''&quot; expression.<br />
    Your initial query which is going to be stored as a bookmark has to yield at
    least one result row so
    you can store the bookmark. You may have that to work around using well
    positioned &quot;/**/&quot; comments.</p>

<h4 id="faq6_19">
    <a href="#faq6_19">6.19 How can I create simple L<sup>A</sup>T<sub><big>E</big></sub>X document to
    include exported table?</a></h4>

<p> You can simply include table in your L<sup>A</sup>T<sub><big>E</big></sub>X documents, minimal sample
    document should look like following one (assuming you have table
    exported in file <code>table.tex</code>):</p>

<pre>
\documentclass{article} % or any class you want
\usepackage{longtable}  % for displaying table
\begin{document}        % start of document
\include{table}         % including exported table
\end{document}          % end of document
</pre>

<h4 id="faq6_20">
    <a href="#faq6_20">6.20 I see a lot of databases which are not mine, and cannot
    access them.
</a></h4>

<p> You have one of these global privileges: CREATE
    TEMPORARY TABLES, SHOW DATABASES, LOCK TABLES. Those privileges also
    enable users to see all the database names.
    See this <a href="http://bugs.mysql.com/179">bug report</a>.<br /><br />

    So if your users do not need those privileges, you can remove them and their
    databases list will shorten.</p>

<h4 id="faq6_21">
    <a href="#faq6_21">6.21 In edit/insert mode, how can I see a list of
    possible values for a column, based on some foreign table?</a></h4>

<p> You have to setup appropriate links between the tables, and also
    setup the &quot;display column&quot; in the foreign table. See
    <a href="#faq6_6"><abbr title="Frequently Asked Questions">FAQ</abbr>
    6.6</a> for an example. Then, if there are 100 values or less in the
    foreign table, a drop-down list of values will be available.
    You will see two lists of values, the first list containing the key
    and the display column, the second list containing the display column 
    and the key. The reason for this is to be able to type the first
    letter of either the key or the display column.<br /><br />

    For 100 values or more, a distinct window will appear, to browse foreign
    key values and choose one. To change the default limit of 100, see
    <tt><a href="#cfg_ForeignKeyMaxLimit" class="configrule">$cfg['ForeignKeyMaxLimit']</a></tt>.</p>

<h4 id="faq6_22">
    <a href="#faq6_22">6.22 Bookmarks: Can I execute a default bookmark
    automatically when entering Browse mode for a table?</a></h4>

<p> Yes. If a bookmark has the same label as a table name and it's not a public bookmark, it will be executed.
</p>

<h4 id="faq6_23">
    <a href="#faq6_23">6.23 Export: I heard phpMyAdmin can export Microsoft Excel files?</a></h4>

<p> You can use
    <abbr title="comma separated values">CSV</abbr> for Microsoft Excel,
    which works out of the box.<br />
    Since phpMyAdmin 3.4.5 support for direct export to Microsoft Excel 
    version 97 and newer was dropped.
</p>

<h4 id="faq6_24">
    <a href="#faq6_24">6.24 Now that phpMyAdmin supports native MySQL 4.1.x column comments,
    what happens to my column comments stored in pmadb?</a></h4>

<p> Automatic migration of a table's pmadb-style column comments to the native
    ones is done whenever you enter Structure page for this table.</p>

<h4 id="faq6_25">
    <a href="#faq6_25">6.25 How does BLOB streaming work in phpMyAdmin?</a></h4>

<p> For general information about BLOB streaming on MySQL, visit <a href="http://blobstreaming.org">blobstreaming.org</a>. You need the following components:</p>
<ul>
    <li>PBMS BLOB Streaming Daemon for MySQL (0.5.15 or later)</li>
    <li>Streaming enabled PBXT Storage engine for MySQL (1.0.11-6 or
    later)</li>
    <li>PBMS Client Library for MySQL (0.5.15 or later)</li>
    <li>PBMS PHP Extension for MySQL (0.1.1 or later)</li>
</ul>

<p>Here are details about configuration and operation:</p>

<ol>
    <li>In <tt>config.inc.php</tt> your host should be defined with a FQDN (fully qualified domain name) instead of &quot;localhost&quot;.</li>
    <li>Ensure that your target table is under the <tt>PBXT</tt> storage engine and has a <tt>LONGBLOB</tt> column (which must be nullable if you want to remove the BLOB reference from it).</li>
    <li>When you insert or update a row in this table, put a checkmark on the &quot;Upload to BLOB repository&quot; optional choice; otherwise, the upload will be done directly in your LONGBLOB column instead of the repository.</li>
    <li>Finally when you browse your table, you'll see in your column a link to stream your data, for example &quot;View image&quot;. A header containing the correct MIME-type will be sent to your browser; this MIME-type was stored at upload time.</li> 
</ol>    

<h4 id="faq6_26">
    <a href="#faq6_26">6.26 How can I select a range of rows?</a></h4>

<p> Click the first row of the range, hold the shift key and click the last row of the range. This works everywhere you see rows, for example in Browse mode or on the Structure page.</p>


<h4 id="faq6_27">
    <a href="#faq6_27">6.27 What format strings can I use?</a></h4>

<p>
    In all places where phpMyAdmin accepts format strings, you can use
    <code>@VARIABLE@</code> expansion and 
    <a href="http://php.net/strftime">strftime</a> format strings. The
    expanded variables depend on a context (for example, if you haven't chosen a 
    table, you can not get the table name), but the following variables can be used:
</p>
<dl>
    <dt><code>@HTTP_HOST@</code></dt>
        <dd>HTTP host that runs phpMyAdmin</dd>
    <dt><code>@SERVER@</code></dt>
        <dd>MySQL server name</dd>
    <dt><code>@VERBOSE@</code></dt>
        <dd>Verbose MySQL server name as defined in <a href="#cfg_Servers_verbose">server configuration</a></dd>
    <dt><code>@VSERVER@</code></dt>
        <dd>Verbose MySQL server name if set, otherwise normal</dd>
    <dt><code>@DATABASE@</code></dt>
        <dd>Currently opened database</dd>
    <dt><code>@TABLE@</code></dt>
        <dd>Currently opened table</dd>
    <dt><code>@COLUMNS@</code></dt>
        <dd>Columns of the currently opened table</dd>
    <dt><code>@PHPMYADMIN@</code></dt>
        <dd>phpMyAdmin with version</dd>
</dl>

<h4 id="wysiwyg">
    <a href="#wysiwyg">6.28 How can I easily edit relational schema for export?</a></h4>

    <p> 
        By clicking on the button 'toggle scratchboard' on the page
        where you edit x/y coordinates of those elements you can activate a
        scratchboard where all your elements are placed. By clicking on an
        element, you can move them around in the pre-defined area and the x/y
        coordinates will get updated dynamically. Likewise, when entering a
        new position directly into the input field, the new position in the
        scratchboard changes after your cursor leaves the input field.
    </p>
    <p>
        You have to click on the 'OK'-button below the tables to save the new
        positions.  If you want to place a new element, first add it to the
        table of elements and then you can drag the new element around.
    </p>
    <p>
        By changing the paper size and the orientation you can change the size
        of the scratchboard as well. You can do so by just changing the
        dropdown field below, and the scratchboard will resize automatically,
        without interfering with the current placement of the elements.
    </p>
    <p>
        If ever an element gets out of range you can either enlarge the paper
        size or click on the 'reset' button to place all elements below each
        other.
    </p>

<h4 id="faq6_29">
    <a href="#faq6_29">6.29 Why can't I get a chart from my query result table?</a></h4>

<p> Not every table can be put to the chart. Only tables with one, two or three columns can be visualised as a chart. Moreover the table must be in a special format for chart script to understand it. Currently supported formats can be found in the <a href="http://wiki.phpmyadmin.net/pma/Charts#Data_formats_for_query_results_chart">wiki</a>.</p>

<h4 id="faq6_30">
    <a href="#faq6_30">6.30 Import: How can I import ESRI Shapefiles</a></h4>

    <p> 
        An ESRI Shapefile is actually a set of several files, where .shp file contains 
        geometry data and .dbf file contains data related to those geometry data. 
        To read data from .dbf file you need to have PHP compiled with the dBase extension 
        (--enable-dbase). Otherwise only geometry data will be imported.
    </p>

    <p>To upload these set of files you can use either of the following methods:</p>
    <ul>
        <li>
            <p>
            Configure upload directory with 
            <a href="#cfg_UploadDir" class="configrule">$cfg['UploadDir']</a>, upload both 
            .shp and .dbf files with the same filename and chose the .shp file from the import page.
            </p>
        </li>
        <li>
            <p>
            Create a Zip archive with .shp and .dbf files and import it. For this to work, 
            you need to set <a href="#cfg_TempDir" class="configrule">$cfg['TempDir']</a> to a
            place where the web server user can write (for example <tt>'./tmp'</tt>).
            </p>

            <p> To create the temporary directory on a UNIX-based system, you can do:</p>
<pre>
cd phpMyAdmin
mkdir tmp
chmod o+rwx tmp
</pre>
        </li>
    </ul>

<h4 id="faq6_31">
    <a href="#faq6_31">6.31 How do I create a relation in designer?</a></h4>

    <p>To select relation, click:<br />
    <img src="themes/original/img/pmd/help_relation.png" width="100" height="100" alt="[relation icon]" /><br />
    The display column is shown in pink. To set/unset a column as the display column, click the "Choose column to display" icon, then click on the appropriate column name.</p>

<h4 id="faq6_32">
    <a href="#faq6_32">6.32 How can I use the zoom search feature?</a></h4>

    <p> The Zoom search feature is an alternative to table search feature. It allows you to explore  
    a table by representing its data in a scatter plot. You can locate this feature by selecting
    a table and clicking the 'Search' tab. One of the sub-tabs in the 'Table Search' page is 
    'Zoom Search'. <br/><br/>

    Consider the table REL_persons in <a href="#faq6_6"><abbr title="Frequently Asked Questions">
    FAQ</abbr> 6.6</a> for an example. To use zoom search, two columns need to be selected, 
    for example, id and town_code. The id values will be represented on one axis and town_code 
    values on the other axis. Each row will be represented as a point in a scatter plot based 
    on its id and town_code. You can include two additional search criteria apart from the two
    fields to display.<br/><br/>

    You can choose which field should be displayed as label for each point. If a display
    column has been set for the table (see <a href="#faqdisplay"><abbr title="Frequently Asked 
    Questions">FAQ</abbr> 6.7</a>), it is taken as the label unless you specify otherwise.
    You can also select the maximum number of rows you want to be displayed in the plot by
    specifing it in the 'Max rows to plot' field. Once you have decided over your criteria,
    click 'Go' to display the plot.<br/><br/>

    After the plot is generated, you can use the mousewheel to zoom in and out of the plot.
    In addition, panning feature is enabled to navigate through the plot. You can zoom-in to
    a certail level of detail and use panning to locate your area of interest. Clicking on a
    point opens a dialogue box, displaying field values of the data row represented by the point.
    You can edit the values if required and click on submit to issue an update query. Basic
    instructions on how to use can be viewed by clicking the 'How to use?' link located just above
    the plot.</p>

<h3 id="faqproject">phpMyAdmin project</h3>

<h4 id="faq7_1">
    <a href="#faq7_1">7.1 I have found a bug. How do I inform developers?</a></h4>

<p> Our Bug Tracker is located at
    <a href="http://sf.net/projects/phpmyadmin/">http://sf.net/projects/phpmyadmin/</a>
    under the Bugs section.<br /><br />

    But please first discuss your bug with other users:<br />
    <a href="https://sourceforge.net/projects/phpmyadmin/forums">
    https://sourceforge.net/projects/phpmyadmin/forums</a>.
</p>

<h4 id="faq7_2">
    <a href="#faq7_2">7.2 I want to translate the messages to a new language or upgrade an
    existing language, where do I start?</a></h4>

<p> Translations are very welcome and all you need to have are the language skills.
    The easiest way is to use our <a href="https://l10n.cihar.com/projects/phpmyadmin/">online
    translation service</a>.
    You can check out all the possibilities to translate in the
    <a href="http://www.phpmyadmin.net/home_page/translate.php">translate section on our website</a>.
    </p>

<h4 id="faq7_3">
    <a href="#faq7_3">7.3 I would like to help out with the development of
    phpMyAdmin. How should I proceed?</a></h4>

<p>We welcome every contribution to the development of phpMyAdmin. 
   You can check out all the possibilities to contribute in the
   <a href="http://www.phpmyadmin.net/home_page/improve.php">contribute section on our website</a>.
   </p>

<h3 id="faqsecurity">Security</h3>

<h4 id="faq8_1">
    <a href="#faq8_1">8.1 Where can I get information about the security alerts issued for phpMyAdmin?</a></h4>

<p> Please refer to
    <a href="http://www.phpmyadmin.net/home_page/security.php">http://www.phpmyadmin.net/home_page/security.php</a>
</p>

<h4 id="faq8_2">
    <a href="#faq8_2">8.2 How can I protect phpMyAdmin against brute force attacks?</a></h4>

<p> If you use Apache web server, phpMyAdmin exports information about 
    authentication to the Apache environment and it can be used in Apache logs.
    Currently there are two variables available:
</p>
<dl>
    <dt><code>userID</code></dt>
    <dd>User name of currently active user (he does not have to be logged
    in).</dd>
    <dt><code>userStatus</code></dt>
    <dd>Status of currently active user, one of <code>ok</code> (user is 
    logged in), <code>mysql-denied</code> (MySQL denied user login),
    <code>allow-denied</code> (user denied by allow/deny rules),
    <code>root-denied</code> (root is denied in configuration),
    <code>empty-denied</code> (empty password is denied).</dd>
</dl>
<p>
    <code>LogFormat</code> directive for Apache can look like following:
</p>
<pre>
LogFormat "%h %l %u %t \"%r\" %>s %b \
\"%{Referer}i\" \"%{User-Agent}i\" %{userID}n %{userStatus}n"   pma_combined
</pre>
<p>
    You can then use any log analyzing tools to detect possible break-in
    attempts.
</p>

<h3 id="faqsynchronization">Synchronization</h3>
<h4 id="faq9_1">
    <a href="#faq9_1">9.1 How can I synchronize two databases/tables in phpMyAdmin?</a></h4>

<p> You can now synchronize databases/tables in phpMyAdmin using the Synchronize feature.
It allows you to connect to local as well as remote servers. This requires you to enter 
server host name, username, password, port and the name of the database. Therefore you can 
now synchronize your databases placed on the same server or some remote server.
</p>

<p>
This feature is helpful for developers who need to replicate their
database&#8217;s structure as well as data. Moreover, this feature not only
helps replication but also facilitates the user to keep his/her database
in sync with another database. Other than the full database, certain
tables of the databases can also be synchronized.
</p>

<p>
You need to fill in the host name of the server, the username and
password of an user account already there in MySQL. Port is by default
populated with 3306 (MySQL default port). Then the name of the database
should be mentioned at the end. All the information other than the port
needs to be filled explicitly for the source as well as target servers.
</p>

<p>
After successfully passing through the authentication phase, the source and
target database table names will be displayed. It will be a tabular
representation. 
</p>

<p>
On the left, are listed the source database table names. Some of the
names have a <code>+</code> plus sign preceding them. This shows that these tables
are only present in source database and they need to be added to the
target database in order to synchronize the target database. The tables
whose names are not preceded by a <code>+</code> sign are already present in the
target database. 
</p>

<p>
On the right, are listed the target database table names. There are few
table names that have <code>(not present)</code> appended after their names. This
means that these tables are to be created in target database in order to
synchronize target database with source database. Some table names
have a <code>-</code> minus sign preceding them. This shows that these tables are
only present in target database and they will remain unchanged in the
target database. The column in the middle shows the difference between
the source and target corresponding tables.
</p>

<p>
The difference is depicted by the red and green buttons with <tt>S</tt> and <tt>D</tt>
letters, indicating that either Structure or Data are not up to date. By
clicking on them, they will turn grey, what means that they will be synchronized.
</p>

<h4 id="faq9_2">
    <a href="#faq9_2">9.2 Are there problems with data synchronizing large
        tables?</a></h4>

<p>
Yes. This aspect of synchronization is currently limited to small tables, and they
must have a primary key.
</p>

<!-- DEVELOPERS -->
<h2 id="developers">Developers Information</h2>

<p> phpMyAdmin is Open Source, so you're invited to contribute to it. Many
    great features have been written by other people and you too can help to
    make phpMyAdmin a useful tool.</p>

<p>You can check out all the possibilities to contribute in the
   <a href="http://www.phpmyadmin.net/home_page/improve.php">contribute section on our website</a>.
   </p>

<h2 id="copyright">Copyright</h2>

<pre>
Copyright (C) 1998-2000 Tobias Ratschiller &lt;tobias_at_ratschiller.com&gt;
Copyright (C) 2001-2012 Marc Delisle &lt;marc_at_infomarc.info&gt;
                        Olivier Müller &lt;om_at_omnis.ch&gt;
                        Robin Johnson &lt;robbat2_at_users.sourceforge.net&gt;
                        Alexander M. Turek &lt;me_at_derrabus.de&gt;
                        Michal &#268;iha&#345; &lt;michal_at_cihar.com&gt;
                        Garvin Hicking &lt;me_at_supergarv.de&gt;
                        Michael Keck &lt;mkkeck_at_users.sourceforge.net&gt;
                        Sebastian Mendel &lt;cybot_tm_at_users.sourceforge.net&gt;
                        [check <a href="#credits">credits</a> for more details]
</pre>

<p>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License version 2,
as published by the Free Software Foundation.
</p>

<p>
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
</p>

<p>
You should have received a copy of the GNU General Public License
along with this program.  If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>.
</p>

<!-- CREDITS -->
<h2 id="credits">Credits</h2>

<h3>Credits, in chronological order</h3>

<ul>

<li>Tobias Ratschiller &lt;tobias_at_ratschiller.com&gt;
<ul>
  <li>creator of the phpmyadmin project</li>
  <li>maintainer from 1998 to summer 2000</li>
</ul></li>

<li>Marc Delisle &lt;marc_at_infomarc.info&gt;
<ul>
  <li>multi-language version in December 1998</li>
  <li>various fixes and improvements</li>
  <li><abbr title="structured query language">SQL</abbr> analyser (most of it)</li>
  <li>current project maintainer</li>
</ul></li>

<li>Olivier M&uuml;ller &lt;om_at_omnis.ch&gt;
<ul>
  <li>started SourceForge phpMyAdmin project in March 2001</li>
  <li>sync'ed different existing CVS trees with new features and bugfixes</li>
  <li>multi-language improvements, dynamic language selection</li>
  <li>many bugfixes and improvements</li>
</ul></li>

<li>Lo&iuml;c Chapeaux &lt;lolo_at_phpheaven.net&gt;
<ul>
  <li>rewrote and optimized javascript, DHTML and DOM stuff</li>
  <li>rewrote the scripts so they fit the <abbr title="PHP Extension and Application Repository">PEAR</abbr> coding standards and
      generate XHTML1.0 and CSS2 compliant codes</li>
  <li>improved the language detection system</li>
  <li>many bugfixes and improvements</li>
</ul></li>

<li>Robin Johnson &lt;robbat2_at_users.sourceforge.net&gt;
<ul>
  <li>database maintenance controls</li>
  <li>table type code</li>
  <li>Host authentication <abbr title="Internet Protocol">IP</abbr> Allow/Deny</li>
  <li>DB-based configuration (Not completed)</li>
  <li><abbr title="structured query language">SQL</abbr> parser and pretty-printer</li>
  <li><abbr title="structured query language">SQL</abbr> validator</li>
  <li>many bugfixes and improvements</li>
</ul></li>

<li>Armel Fauveau &lt;armel.fauveau_at_globalis-ms.com&gt;
<ul>
  <li>bookmarks feature</li>
  <li>multiple dump feature</li>
  <li>gzip dump feature</li>
  <li>zip dump feature</li>
</ul></li>

<li>Geert Lund &lt;glund_at_silversoft.dk&gt;
<ul>
  <li>various fixes</li>
  <li>moderator of the phpMyAdmin former users forum at phpwizard.net</li>
</ul></li>

<li>Korakot Chaovavanich &lt;korakot_at_iname.com&gt;
<ul>
  <li>&quot;insert as new row&quot; feature</li>
</ul></li>

<li>Pete Kelly &lt;webmaster_at_trafficg.com&gt;
<ul>
  <li>rewrote and fix dump code</li>
  <li>bugfixes</li>
</ul></li>

<li>Steve Alberty &lt;alberty_at_neptunlabs.de&gt;
<ul>
  <li>rewrote dump code for PHP4</li>
  <li>mySQL table statistics</li>
  <li>bugfixes</li>
</ul></li>

<li>Benjamin Gandon &lt;gandon_at_isia.cma.fr&gt;
<ul>
  <li>main author of the version 2.1.0.1</li>
  <li>bugfixes</li>
</ul></li>

<li>Alexander M. Turek &lt;me_at_derrabus.de&gt;
<ul>
  <li>MySQL 4.0 / 4.1 / 5.0 compatibility</li>
  <li>abstract database interface (PMA_DBI) with MySQLi support</li>
  <li>privileges administration</li>
  <li><abbr title="Extensible Markup Language">XML</abbr> exports</li>
  <li>various features and fixes</li>
  <li>German language file updates</li>
</ul></li>

<li>Mike Beck &lt;mike.beck_at_web.de&gt;
<ul>
  <li>automatic joins in QBE</li>
  <li>links column in printview</li>
  <li>Relation view</li>
</ul></li>

<li>Michal &#268;iha&#345; &lt;michal_at_cihar.com&gt;
<ul>
  <li>enhanced index creation/display feature</li>
  <li>feature to use a different charset for HTML than for MySQL</li>
  <li>improvements of export feature</li>
  <li>various features and fixes</li>
  <li>Czech language file updates</li>
</ul></li>

<li>Christophe Gesch&eacute; from the &quot;MySQL Form Generator for PHPMyAdmin&quot;
  (http://sf.net/projects/phpmysqlformgen/)
<ul>
  <li>suggested the patch for multiple table printviews</li>
</ul></li>

<li>Garvin Hicking &lt;me_at_supergarv.de&gt;
<ul>
  <li>built the patch for vertical display of table rows</li>
  <li>built the Javascript based Query window + <abbr title="structured query language">SQL</abbr> history</li>
  <li>Improvement of column/db comments</li>
  <li>(MIME)-Transformations for columns</li>
  <li>Use custom alias names for Databases in left frame</li>
  <li>hierarchical/nested table display</li>
  <li><abbr title="Portable Document Format">PDF</abbr>-scratchboard for WYSIWYG-distribution of <abbr title="Portable Document Format">PDF</abbr> relations</li>
  <li>new icon sets</li>
  <li>vertical display of column properties page</li>
  <li>some bugfixes, features, support, German language additions</li>
</ul></li>

<li>Yukihiro Kawada &lt;kawada_at_den.fujifilm.co.jp&gt;
<ul>
  <li>japanese kanji encoding conversion feature</li>
</ul></li>

<li>Piotr Roszatycki &lt;d3xter_at_users.sourceforge.net&gt; and Dan Wilson
<ul>
  <li>the Cookie authentication mode</li>
</ul></li>

<li>Axel Sander &lt;n8falke_at_users.sourceforge.net&gt;
<ul>
  <li>table relation-links feature</li>
</ul></li>

<li>Maxime Delorme &lt;delorme.maxime_at_free.fr&gt;
<ul>
  <li><abbr title="Portable Document Format">PDF</abbr> schema output, thanks also to Olivier Plathey for the
      &quot;FPDF&quot; library (see <a href="http://www.fpdf.org/">http://www.fpdf.org/</a>) and Steven Wittens
      for the &quot;UFPDF&quot; library (see <a href="http://www.acko.net/node/56">http://www.acko.net/node/56</a>).</li>
</ul></li>

<li>Olof Edlund &lt;olof.edlund_at_upright.se&gt;
<ul>
  <li><abbr title="structured query language">SQL</abbr> validator server</li>
</ul></li>

<li>Ivan R. Lanin &lt;ivanlanin_at_users.sourceforge.net&gt;
<ul>
  <li>phpMyAdmin logo (until June 2004)</li>
</ul></li>

<li>Mike Cochrane &lt;mike_at_graftonhall.co.nz&gt;
<ul>
  <li>blowfish library from the Horde project</li>
</ul></li>

<li>Marcel Tschopp &lt;ne0x_at_users.sourceforge.net&gt;
<ul>
  <li>mysqli support</li>
  <li>many bugfixes and improvements</li>
</ul></li>

<li>Nicola Asuni (Tecnick.com)
<ul>
    <li>TCPDF library (<a
        href="http://www.tcpdf.org">http://www.tcpdf.org</a>)</li>
</ul></li>

<li>Michael Keck &lt;mkkeck_at_users.sourceforge.net&gt;
<ul>
  <li>redesign for 2.6.0</li>
  <li>phpMyAdmin sailboat logo (June 2004)</li>
</ul></li>

<li>Mathias Landh&auml;u&szlig;er
<ul>
  <li>Representation at conferences</li>
</ul></li>

<li>Sebastian Mendel &lt;cybot_tm_at_users.sourceforge.net&gt;
<ul>
  <li>interface improvements</li>
  <li>various bugfixes</li>
</ul></li>

<li>Ivan A Kirillov
<ul>
  <li>new relations Designer</li>
</ul></li>

<li>Raj Kissu Rajandran (Google Summer of Code 2008)
<ul>
  <li>BLOBstreaming support</li>
</ul></li>

<li>Piotr Przybylski (Google Summer of Code 2008, 2010 and 2011)
<ul>
  <li>improved setup script</li>
  <li>user preferences</li>
  <li>Drizzle support</li>
</ul></li>

<li>Derek Schaefer (Google Summer of Code 2009)
<ul>
  <li>Improved the import system</li>
</ul></li>

<li>Alexander Rutkowski (Google Summer of Code 2009)
<ul>
  <li>Tracking mechanism</li>
</ul></li>

<li>Zahra Naeem (Google Summer of Code 2009)
<ul>
  <li>Synchronization feature</li>
</ul></li>

<li>Tom&#225;&#353; Srnka (Google Summer of Code 2009)
<ul>
  <li>Replication support</li>
</ul></li>

<li>Muhammad Adnan (Google Summer of Code 2010)
<ul>
  <li>Relation schema export to multiple formats</li>
</ul></li>

<li>Lori Lee (Google Summer of Code 2010)
<ul>
  <li>User interface improvements</li>
  <li>ENUM/SET editor</li>
  <li>Simplified interface for export/import</li>
</ul></li>

<li>Ninad Pundalik (Google Summer of Code 2010)
<ul>
  <li>AJAXifying the interface</li>
</ul></li>

<li>Martynas Mickevičius (Google Summer of Code 2010)
<ul>
  <li>Charts</li>
</ul></li>

<li>Barrie Leslie
<ul>
  <li>BLOBstreaming support with PBMS PHP extension</li>
</ul></li>

<li>Ankit Gupta (Google Summer of Code 2010)
<ul>
  <li>Visual query builder</li>
</ul></li>

<li>Rouslan Placella (Google Summer of Code 2011)
<ul>
  <li>Improved support for Stored Routines, Triggers and Events</li>
  <li>Italian translation updates</li>
</ul></li>

<li>Dieter Adriaenssens
<ul>
  <li>Various bugfixes</li>
  <li>Dutch translation updates</li>
</ul></li>

</ul>

<p>
And also to the following people who have contributed minor changes,
enhancements, bugfixes or support for a new language since version 2.1.0:
</p>

<p>
Bora Alioglu, Ricardo ?, Sven-Erik Andersen, Alessandro Astarita,
P&eacute;ter Bakondy, Borges Botelho, Olivier Bussier, Neil Darlow,
Mats Engstrom, Ian Davidson, Laurent Dhima, Kristof Hamann, Thomas Kl&auml;ger,
Lubos Klokner, Martin Marconcini, Girish Nair, David Nordenberg, Andreas Pauley,
Bernard M. Piller, Laurent Haas, &quot;Sakamoto&quot;, Yuval Sarna,
www.securereality.com.au, Alexis Soulard, Alvar Soome, Siu Sun, Peter Svec,
Michael Tacelosky, Rachim Tamsjadi, Kositer Uros,
Lu&iacute;s V., Martijn W. van der Lee,
Algis Vainauskas, Daniel Villanueva, Vinay, Ignacio Vazquez-Abrams, Chee Wai,
Jakub Wilk, Thomas Michael Winningham, Vilius Zigmantas, &quot;Manuzhai&quot;.
</p>


<h3>Original Credits of Version 2.1.0</h3>

<p>
    This work is based on Peter Kuppelwieser's MySQL-Webadmin. It was his idea
    to create a web-based interface to MySQL using PHP3. Although I have not
    used any of his source-code, there are some concepts I've borrowed from
    him. phpMyAdmin was created because Peter told me he wasn't going to
    further develop his (great) tool.
</p>
<p>
    Thanks go to
</p>
<ul>
  <li>Amalesh Kempf &lt;ak-lsml_at_living-source.com&gt; who contributed the
      code for the check when dropping a table or database. He also suggested
      that you should be able to specify the primary key on tbl_create.php3. To
      version 1.1.1 he contributed the ldi_*.php3-set (Import text-files) as
      well as a bug-report. Plus many smaller improvements.
  </li>
  <li>Jan Legenhausen &lt;jan_at_nrw.net&gt;: He made many of the changes that
      were introduced in 1.3.0 (including quite significant ones like the
      authentication). For 1.4.1 he enhanced the table-dump feature. Plus
      bug-fixes and help.
  </li>
  <li>Marc Delisle &lt;DelislMa_at_CollegeSherbrooke.qc.ca&gt; made phpMyAdmin
      language-independent by outsourcing the strings to a separate file. He
      also contributed the French translation.
  </li>
  <li>Alexandr Bravo &lt;abravo_at_hq.admiral.ru&gt; who contributed
      tbl_select.php3, a feature to display only some columns from a table.
  </li>
  <li>Chris Jackson &lt;chrisj_at_ctel.net&gt; added support for MySQL
      functions in tbl_change.php3. He also added the
      &quot;Query by Example&quot; feature in 2.0.
  </li>
  <li>Dave Walton &lt;walton_at_nordicdms.com&gt; added support for multiple
      servers and is a regular contributor for bug-fixes.
  </li>
  <li>Gabriel Ash &lt;ga244_at_is8.nyu.edu&gt; contributed the random access
      features for 2.0.6.
  </li>
</ul>
<p>
    The following people have contributed minor changes, enhancements, bugfixes
    or support for a new language:
</p>
<p>
    Jim Kraai, Jordi Bruguera, Miquel Obrador, Geert Lund, Thomas Kleemann,
    Alexander Leidinger, Kiko Albiol, Daniel C. Chao, Pavel Piankov,
    Sascha Kettler, Joe Pruett, Renato Lins, Mark Kronsbein, Jannis Hermanns,
    G. Wieggers.
</p>
<p>
    And thanks to everyone else who sent me email with suggestions, bug-reports
    and or just some feedback.
</p>

<h2 id="glossary">Glossary</h2>

<p> From Wikipedia, the free encyclopedia</p>

<ul>
    <li><a href="http://www.wikipedia.org/wiki/.htaccess">.htaccess</a>
         - the default name of Apache's directory-level configuration file.</li>
    <li><a href="http://www.wikipedia.org/wiki/Blowfish_%28cipher%29">Blowfish</a>
         - a keyed, symmetric block cipher, designed in 1993 by Bruce Schneier.</li>
    <li><a href="http://en.wikipedia.org/wiki/Web_browser">Browser (Web Browser)</a>
         - a software application that enables a user to display and interact with
         text, images, and other information typically located on a web page at a
         website on the World Wide Web.</li>
    <li><a href="http://www.wikipedia.org/wiki/Bzip2">bzip2</a>
         - a free software/open source data compression algorithm and program
         developed by Julian Seward.</li>
    <li><a href="http://www.wikipedia.org/wiki/CGI">CGI (Common Gateway Interface)</a>
         - an important World Wide Web technology that enables a client web browser
         to request data from a program executed on the Web server.</li>
    <li><a href="http://www.wikipedia.org/wiki/Changelog">Changelog</a>
         - a log or record of changes made to a project.</li>
    <li><a href="http://www.wikipedia.org/wiki/Client_%28computing%29">Client</a>
         - a computer system that accesses a (remote) service on another computer
         by some kind of network.</li>
    <li><a href="http://www.wikipedia.org/wiki/Column_%28database%29">column</a>
         - a set of data values of a particular simple type, one for each row of
         the table.</li>
    <li><a href="http://www.wikipedia.org/wiki/HTTP_cookie">Cookie</a>
         - a packet of information sent by a server to a World Wide Web browser
         and then sent back by the browser each time it accesses that server.</li>
    <li><a href="http://www.wikipedia.org/wiki/Comma-separated_values">CSV</a>
         - Comma-separated values</li>
    <li>DB - look at <a href="#database">Database</a>.</li>
    <li><a id="database" href="http://www.wikipedia.org/wiki/Database">database</a>
         - an organized collection of data.</li>
    <li>Engine - look at <a href="#glossar_storage_engine">Storage Engines</a>.</li>
    <li><a href="http://www.wikipedia.org/wiki/extension">extension</a>
         - a PHP module that extends PHP with additional functionality.</li>
    <li><a href="http://www.wikipedia.org/wiki/FAQ">FAQ (Frequently Asked Questions)</a>
         - a list of commonly asked question and there answers.</li>
    <li><a href="http://www.wikipedia.org/wiki/Field_%28computer_science%29">Field</a>
         - one part of divided data/columns.</li>
    <li><a href="http://www.wikipedia.org/wiki/Foreign_key">foreign key</a>
         - a column or group of columns in a database row that point to a key
         column or group of columns forming a key of another database row in some
         (usually different) table.</li>
    <li><a href="http://www.fpdf.org/">FPDF (FreePDF)</a>
        - the free PDF library</li>
    <li><a id="gd" href="http://www.wikipedia.org/wiki/GD_Graphics_Library">
        GD Graphics Library</a> - a library by Thomas Boutell and others for
        dynamically manipulating images.</li>
    <li>GD2 - look at <a href="#gd">GD Graphics Library</a>.</li>
    <li><a href="http://www.wikipedia.org/wiki/Gzip">gzip</a>
         - gzip is short for GNU zip, a GNU free software file compression
         program.</li>
    <li><a href="http://www.wikipedia.org/wiki/Host">host</a>
         - any machine connected to a computer network, a node that has a hostname.</li>
    <li><a href="http://www.wikipedia.org/wiki/Hostname">hostname</a>
         - the unique name by which a network attached device is known on a network.</li>
    <li><a href="http://www.wikipedia.org/wiki/HyperText_Transfer_Protocol">HTTP
            (HyperText Transfer Protocol)</a>
         - the primary method used to transfer or convey information on the World
         Wide Web.</li>
    <li><a href="http://www.wikipedia.org/wiki/Https:_URI_scheme">https</a>
         - a <abbr title="HyperText Transfer Protocol">HTTP</abbr>-connection with
         additional security measures.</li>
    <li><a href="http://www.wikipedia.org/wiki/Internet_Information_Services">IIS (Internet Information Services)</a>
         - a set of Internet-based services for servers using Microsoft Windows.</li>
    <li><a id="glossar_index" href="http://www.wikipedia.org/wiki/Index_%28database%29">Index</a>
         - a feature that allows quick access to the rows in a table.</li>
    <li><a href="http://www.wikipedia.org/wiki/Internet_Protocol">IP (Internet Protocol)</a>
         - a data-oriented protocol used by source and destination hosts for
         communicating data across a packet-switched internetwork.</li>
    <li><a href="http://www.wikipedia.org/wiki/IP_Address">IP Address</a>
         - a unique number that devices use in order to identify and communicate
         with each other on a network utilizing the Internet Protocol standard.</li>
    <li><a href="http://www.wikipedia.org/wiki/ISAPI">ISAPI
            (Internet Server Application Programming Interface)</a>
         - the API of Internet Information Services (IIS).</li>
    <li><a href="http://www.wikipedia.org/wiki/ISP">ISP (Internet service provider)</a>
         - a business or organization that offers users access to the Internet and related services.</li>
    <li><a id="jpeg" href="http://www.wikipedia.org/wiki/JPEG">JPEG</a>
         - a most commonly used standard method of lossy compression for
         photographic images.</li>
    <li>JPG - look at <a href="#jpeg">JPEG</a>.</li>
    <li>Key - look at <a href="#glossar_index">index</a>.</li>
    <li><a href="http://www.wikipedia.org/wiki/LaTeX">L<sup>A</sup>T<sub><big>E</big></sub>X</a>
         - a document preparation system for the T<sub>E</sub>X typesetting program.</li>
    <li><a href="http://www.wikipedia.org/wiki/Mac">Mac (Apple Macintosh)</a>
         - line of personal computers is designed, developed, manufactured, and
         marketed by Apple Computer.</li>
    <li><a id="glossar_mac_os_x" href="http://www.wikipedia.org/wiki/Mac_OS_X"><acronym title="Apple Macintosh">Mac</acronym> <abbr title="operating system">OS</abbr> X</a>
        - the operating system which is included with all currently shipping Apple
        Macintosh computers in the consumer and professional markets.</li>
    <li><a href="http://www.wikipedia.org/wiki/MCrypt">MCrypt</a>
         - a cryptographic library.</li>
    <li><a href="http://php.net/mcrypt">mcrypt</a>
         - the MCrypt PHP extension.</li>
    <li><a href="http://www.wikipedia.org/wiki/MIME">MIME (Multipurpose Internet Mail Extensions)</a>
         - an Internet Standard for the format of e-mail.</li>
    <li><a href="http://www.wikipedia.org/wiki/module">module</a>
         - some sort of extension for the Apache Webserver.</li>
    <li><a href="http://www.wikipedia.org/wiki/MySQL">MySQL</a>
         - a multithreaded, multi-user, SQL (Structured Query Language) Database
         Management System (DBMS).</li>
    <li><a href="http://php.net/mysqli">mysqli</a>
         - the improved MySQL client PHP extension.</li>
    <li><a href="http://php.net/mysql">mysql</a>
         - the MySQL client PHP extension.</li>
    <li><a href="http://www.wikipedia.org/wiki/OpenDocument">OpenDocument</a>
         - open standard for office documents.</li>
    <li><a href="http://www.wikipedia.org/wiki/OS_X"><abbr title="operating system">OS</abbr> X</a>
         - look at <a href="#glossar_mac_os_x"><acronym title="Apple Macintosh">Mac</acronym> <abbr title="operating system">OS</abbr> X</a>.</li>
    <li><a href="http://www.wikipedia.org/wiki/Portable_Document_Format">PDF
            (Portable Document Format)</a>
         - a file format developed by Adobe Systems for representing two
         dimensional documents in a device independent and resolution independent
         format.</li>
    <li><a href="http://pear.php.net/">PEAR</a>
        - the PHP Extension and Application Repository.</li>
    <li><a href="http://php.net/pcre">PCRE (Perl Compatible Regular Expressions)</a>
        - the perl-compatible regular expression functions for PHP</li>
    <li><a href="http://www.wikipedia.org/wiki/PHP">PHP</a>
         - short for "PHP: Hypertext Preprocessor", is an open-source, reflective
         programming language used mainly for developing server-side applications
         and dynamic web content, and more recently, a broader range of software
         applications.</li>
    <li><a href="http://www.wikipedia.org/wiki/Port_%28computing%29">port</a>
         - a connection through which data is sent and received.</li>
    <li><a href="http://www.wikipedia.org/wiki/Request_for_Comments">RFC</a>
         - Request for Comments (RFC) documents are a series of memoranda
         encompassing new research, innovations, and methodologies applicable to
         Internet technologies.</li>
    <li><a href="http://www.ietf.org/rfc/rfc1952.txt">RFC 1952</a>
         - GZIP file format specification version 4.3</li>
    <li><a href="http://www.wikipedia.org/wiki/Row_%28database%29">Row (record, tuple)</a>
        - represents a single, implicitly structured data item in a table.</li>
    <li><a href="http://www.wikipedia.org/wiki/Server_%28computing%29">Server</a>
         - a computer system that provides services to other computing
         systems over a network.</li>
    <li><a id="glossar_storage_engine" href="http://dev.mysql.com/doc/en/storage-engines.html">Storage Engines</a>
        - handlers for different table types</li>
    <li><a href="http://www.wikipedia.org/wiki/Socket#Computer_sockets">socket</a>
         - a form of inter-process communication.</li>
    <li><a href="http://www.wikipedia.org/wiki/Secure_Sockets_Layer">SSL (Secure
            Sockets Layer)</a>
         - a cryptographic protocol which provides secure communication on the Internet.</li>
    <li><a href="http://en.wikipedia.org/wiki/Stored_procedure">Stored procedure</a>
         - a subroutine available to applications accessing a relational database system</li>
    <li><a href="http://www.wikipedia.org/wiki/SQL">SQL</a>
         - Structured Query Language</li>
    <li><a href="http://www.wikipedia.org/wiki/Table_%28database%29">table</a>
         - a set of data elements (cells) that is organized, defined and stored as
         horizontal rows and vertical columns where each item can be uniquely
         identified by a label or key or by it?s position in relation to other items.</li>
    <li>Table type</li>
    <li><a href="http://www.wikipedia.org/wiki/Tar_%28file_format%29">tar</a>
         - a type of archive file format: the Tape ARchive format.</li>
    <li><a href="http://www.wikipedia.org/wiki/TCP">TCP (Transmission Control Protocol)</a>
         - one of the core protocols of the Internet protocol suite.</li>
    <li><a href="http://en.wikipedia.org/wiki/Database_trigger">trigger</a>
         - a procedural code that is automatically executed in response to
         certain events on a particular table or view in a database</li>
    <li><a href="http://www.acko.net/node/56">UFPDF</a>
        - Unicode/UTF-8 extension for FPDF</li>
    <li><a href="http://www.wikipedia.org/wiki/URL">URL (Uniform Resource Locator)</a>
         - a sequence of characters, conforming to a standardized format, that is
         used for referring to resources, such as documents and images on the
         Internet, by their location.</li>
    <li><a href="http://www.wikipedia.org/wiki/Webserver">Webserver</a>
         - A computer (program) that is responsible for accepting HTTP requests
         from clients and serving them Web pages.</li>
    <li><a href="http://www.wikipedia.org/wiki/XML">XML (Extensible Markup Language)</a>
         - a W3C-recommended general-purpose markup language for creating
         special-purpose markup languages, capable of describing many different
         kinds of data.</li>
    <li><a href="http://www.wikipedia.org/wiki/ZIP_%28file_format%29">ZIP</a>
        - a popular data compression and archival format.</li>
    <li><a href="http://www.wikipedia.org/wiki/Zlib">zlib</a>
         - an open-source, cross-platform data compression library by Jean-loup
         Gailly and Mark Adler.</li>
</ul>
</div>

  <ul id="footer">
    <li>Copyright &copy; 2003 - 2010 <a href="http://www.phpmyadmin.net/home_page/team.php">phpMyAdmin devel team</a></li>
    <li><a href="LICENSE">License</a></li>
    <li><a href="http://www.phpmyadmin.net/home_page/donate.php">Donate</a></li>
    <li class="last">Valid <a href="http://validator.w3.org/check/referer">HTML</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></li>
  </ul>

</body>
</html>
