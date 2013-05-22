<html>
	<head>
		<title>HTML Online Editor Sample</title>
	</head>
	<body>
		<h1>
			Product Tracking</h1>
		<p>
			This is the project of DSMWare course of group formed by LUONG Trong Hieu &amp; NGUYEN Duc Trung.</p>
		<p>
			<strong>SET UP ENVIRONMENT FOR DEVELOPMENT</strong></p>
		<p style="margin-left: 40px;">
			1. You can use some php IDEs such as Eclipse, <a href="http://www.jetbrains.com/phpstorm/"><u>phpStorm</u></a> (recommended) to develop</p>
		<ul>
			<li style="margin-left: 40px;">
				If you use phpStorm, the configuration file puted in responsitory might be useful.</li>
			<li style="margin-left: 40px;">
				Install xdebug for debugging</li>
		</ul>
		<p style="margin-left: 40px;">
			2. Install php5 &amp; Apache server by following <a href="http://www.howtogeek.com/howto/ubuntu/installing-php5-and-apache-on-ubuntu/">this instruction</a> (for ubuntu users) and <a href="http://php.net/manual/en/install.php">this instruction</a> for general users.</p>
		<ul>
			<li style="margin-left: 40px;">
				You should choose another directory for storing root directory of server (default is /var/www) because the other IDEs difficultly wirte into these directory. You can choose /home/www/.</li>
		</ul>
		<p style="margin-left: 40px;">
			3. Install phpmyAdmin by following <a href="https://www.digitalocean.com/community/articles/how-to-install-and-secure-phpmyadmin-on-ubuntu-12-04">this instruction</a> or <a href="https://help.ubuntu.com/community/phpMyAdmin">this</a> (for ubuntu users).</p>
		<p style="margin-left: 80px;">
			After installation, you can navigate your browser to http://localhost/phpmyadmin to work on</p>
		<p style="margin-left: 40px;">
			4. Install Git (if not any)</p>
		<p>
			<strong>PROJECT STRUCTURE</strong></p>
		<p style="margin-left: 40px;">
			The project is based on MVC Model: (written by following <a href="http://johnsquibb.com/tutorials/mvc-framework-in-1-hour-part-one">this tutorial</a> and <a href="http://www.vn-zoom.com/f139/tutorial-mo-hinh-mvc-autoload-controller-va-model-1930595.html">this</a> , but who care ?)</p>
		<p style="margin-left: 40px;">
			<img alt="" src="http://cdn.phpmaster.com/files/2013/03/MVC-Process.png" width="200" /></p>
		<p style="margin-left: 40px;">
			The directories structure:</p>
		<p style="margin-left: 40px;">
			├── Config&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all configuration of website<br />
			│&nbsp;&nbsp; └── Modules&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : contain config file of each module<br />
			│&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; └── Amazon<br />
			├── Controller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all controllers<br />
			│&nbsp;&nbsp; └── Amazon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : controllers of module &#39;Amazon&#39;<br />
			├── Core&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all core classes<br />
			├── design&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all stuff related to &#39;how do users look&#39;<br />
			│&nbsp;&nbsp; ├── css<br />
			│&nbsp;&nbsp; ├── images<br />
			│&nbsp;&nbsp; └── js<br />
			├── Lib&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all libraries<br />
			│&nbsp;&nbsp; ├── Amazon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : library from Amazon<br />
			│&nbsp;&nbsp; └── Drivers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : class to connect and access mySQL data<br />
			├── samples&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : sample codes to test libraries (often download from tutorials)<br />
			└── View&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : all view html templates (with some php variables) for filling up data<br />
			&nbsp;&nbsp;&nbsp; └── Amazon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : templates of module amazon</p>
		<p>
			<strong>THE URL PROCESSING</strong></p>
		<p style="margin-left: 40px;">
			The first, let see the structure of URL when user request. The well-form URL is:</p>
		<p style="margin-left: 40px;">
			<em>http://example.com/index.php/<u>controller/action?param1=value1&amp;param2=value2</u></em></p>
		<p style="margin-left: 40px;">
			So, with url http://localhost, when passed to our application, we will check and fill up to: http://localhost/index.php/index/index&nbsp; (if controller or action is missing)</p>
		<p style="margin-left: 40px;">
			<strong>What is index.php ?</strong></p>
		<p style="margin-left: 40px;">
			Well, index.php is the only one entrance of the application. All request will pass to this file. Therefore, we only need to load configurations &amp; some pre-processing here. It will make our application easier to maintain.</p>
		<p style="margin-left: 40px;">
			<strong>What is the first /index ?</strong></p>
		<p style="margin-left: 40px;">
			This is the name of controller will handle the request. Our application will capitalize the first letter, and add prefix &#39;Controller_&#39; to forming &#39;Controller_Index&#39;. It&#39;s the name of controller class will process request.</p>
		<p style="margin-left: 40px;">
			<strong>What is the second /index ?</strong></p>
		<p style="margin-left: 40px;">
			This is the name of action will be done.</p>
		<p style="margin-left: 40px;">
			After create a new instance of class Controller_Index, we will call function <strong>&#39;index</strong>Function&#39;.</p>
		<p style="margin-left: 40px;">
			&nbsp;</p>
		<p style="margin-left: 40px;">
			OK, for another example, the url: <em>localhost/index.php/site/search?s=amazon&amp;sq=alice</em> will be broken, and splitted to call function &#39;searchAction&#39; and pass parameters $params[&#39;s&#39;]=&#39;amazon&#39; and $params[&#39;sq&#39;]=&#39;alice&#39;&nbsp; ($params is the name of input parameters of this function)</p>
		<p style="margin-left: 40px;">
			&nbsp;</p>
		<p>
			<strong>AUTOLOAD CLASS</strong></p>
		<p style="margin-left: 40px;">
			Whenever you call $x = new Class_X(); but the php file contains class X is never included, php will consider to auto include and load this file.</p>
		<p style="margin-left: 40px;">
			But, how can php know where this file locates ?</p>
		<p style="margin-left: 40px;">
			We can guild for php by function &#39;autoload&#39; in Core/Core.php.</p>
		<p style="margin-left: 40px;">
			Every unknown class name will be broken into directory form. For example, class &#39;Controller_Amazon_home&#39; will located at Controller/Amazon/Home.php</p>
		<p style="margin-left: 40px;">
			This function is used very often in many framwork such as Magento, Wordpress, Zend...</p>
		<p>
			<strong>HOW DOES IT WORK ?</strong></p>
		<p style="margin-left: 40px;">
			Class &#39;Controller&#39; and all class inherit it have a field named &#39;view&#39; (an instance of Core_View class) and this field will render the interface.</p>
		<p style="margin-left: 40px;">
			When the instance of controller is created, it will create new view.</p>
		<p style="margin-left: 40px;">
			When we call function , let say, indexAction, every&nbsp; Model instances (which will get data from database) will be declared here and launch them.</p>
		<p style="margin-left: 40px;">
			After that, the view will be initialized and filled up with data.</p>
		<p style="margin-left: 40px;">
			<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;view-&gt;title_url = &quot;Homepage&quot;;<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;view-&gt;header = (new Core_View(&#39;header&#39;))-&gt;render(FALSE);<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;view-&gt;footer = (new Core_View(&#39;footer&#39;))-&gt;render(FALSE);<br />
			<br />
			<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; // set template is home.php and render<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;view-&gt;setTemplate(&#39;home&#39;);<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;view-&gt;render();</em></p>
		<p style="margin-left: 40px;">
			The interesting thing is title_url, header... is never declared in view class ! when <em>$this-&gt;view-&gt;title_url = &quot;Homepage&quot;; </em><br />
			is involked, the view will assgin $data[&#39;title_url&#39;]=&quot;Homepage&quot; via function:</p>
		<p style="margin-left: 80px;">
			<em>public function __set($index, $value){<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;data[$index] = $value;<br />
			&nbsp;&nbsp;&nbsp; }</em></p>
		<p style="margin-left: 40px;">
			we overrided the default function of php for class Core_View.</p>
		<p style="margin-left: 40px;">
			So, write any field you want: $this-&gt;view-&gt;name, $this-&gt;view-&gt;XXX...</p>
		<p style="margin-left: 40px;">
			and it will be pass into $data[&#39;name&#39;], $data[&#39;XXX&#39;]... and be used in tempated file (you can see in View/home.php)</p>
		<p style="margin-left: 40px;">
			<em>$this-&gt;view-&gt;header = (new Core_View(&#39;header&#39;))-&gt;render(FALSE);</em> will create new Core_View instance with template is &#39;header.php&#39; in View directory and then call function &#39;render&#39; of this function. Parameter FALSE means: don&#39;t output into screen, keep it and return value for whom called it.</p>
		<p style="margin-left: 40px;">
			In render function, the template will be load (by call &#39;include&#39;), all variables will be replaced by its value.</p>
		<p>
			<strong>SEARCHING MODULE</strong></p>
		<p style="margin-left: 40px;">
			All searching module will have its MVC model. The controller will inherit from <strong>Controller_SearchingAbstract</strong>, implements &#39;indexFunction&#39; and &#39;searchingFunction&#39;.</p>
		<p style="margin-left: 40px;">
			When <em>localhost/index.php/site/search?s=amazon&amp;sq=alice </em>is requested, the application will call &#39;<strong>searchingFunction</strong>&#39; of <strong>Controller_Site</strong> class (Controller/Site.php). In this function, we will check if parameter &#39;s&#39; exists or not. If yes, create new instance Controller of amazon module. But, how can we know what controller class of this module ? Oh, it&#39;s declared at <strong><em>Config/Amazon/Amazon.xml</em></strong> and loaded automacally at the begging of application (in Index.php)</p>
		<p style="margin-left: 40px;">
			<em>&lt;amazon&gt;<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;active&gt;true&lt;/active&gt;<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;class&gt;Controller_Amazon_Home&lt;/class&gt;</strong><br />
			&lt;/amazon&gt;</em></p>
		<p style="margin-left: 40px;">
			OK, so the searchingFunction of Controller_Amazon_Home will be called. In this function, we will use web services of amazon to get data. That&#39;s all.</p>
		<p style="margin-left: 40px;">
			&nbsp;</p>
		<p style="margin-left: 40px;">
			So, whenever well need to add new searching website, write it by MVC, and copy into application, create new config file. It&#39;s ok. We don&#39;t need to modify any existing code.</p>
	</body>
</html>
