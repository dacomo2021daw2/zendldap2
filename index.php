<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;

	#ini_set('display_errors', 0);
	if ($_POST['uid'] && $_POST['unorg']){
	   echo "hola";
	   $domini = 'dc=fjeclot,dc=net';
	   $opcions = [
            'host' => 'zend-dacomo.fjeclot.net',
		    'username' => "cn=admin,$domini",
   		    'password' => 'fjeclot',
   		    'bindRequiresDn' => true,
		    'accountDomainName' => 'fjeclot.net',
   		    'baseDn' => 'dc=fjeclot,dc=net',
       ];	
	   $ldap = new Ldap($opcions);
	   $ldap->bind();
	   $nova_entrada = [];
	   Attribute::setAttribute($nova_entrada, 'objectClass[0]', 'inetOrgPerson');
	   Attribute::setAttribute($nova_entrada, 'objectClass[1]', 'organizationalPerson');
	   Attribute::setAttribute($nova_entrada, 'objectClass[2]', 'person');
	   Attribute::setAttribute($nova_entrada, 'objectClass[3]', 'posixAccount');
	   Attribute::setAttribute($nova_entrada, 'objectClass[4]', 'shadowAccount');
	   Attribute::setAttribute($nova_entrada, 'objectClass[5]', 'top');
	   Attribute::setAttribute($nova_entrada, 'uid', $_POST['uid']);
	   Attribute::setAttribute($nova_entrada, 'uidNumber', $_POST['num_uid']);
	   Attribute::setAttribute($nova_entrada, 'gidNumber', $_POST['num_gid']);
	   Attribute::setAttribute($nova_entrada, 'homeDirectory', $_POST['directori']);
	   Attribute::setAttribute($nova_entrada, 'loginShell', $_POST['shell']);
	   Attribute::setAttribute($nova_entrada, 'sn', 'Hans Meier');
	   $cn = $_POST['nom']." ".$_POST['cognom'];
	   Attribute::setAttribute($nova_entrada, 'cn', $cn);
	   Attribute::setAttribute($nova_entrada, 'sn', $_POST['cognom']);
	   Attribute::setAttribute($nova_entrada, 'givenName', $_POST['nom']);
	   Attribute::setAttribute($nova_entrada, 'mobile', $_POST['mobil']);
	   Attribute::setAttribute($nova_entrada, 'postalAddress', $_POST['adressa']);
	   Attribute::setAttribute($nova_entrada, 'telephoneNumber', $_POST['telefon']);
	   Attribute::setAttribute($nova_entrada, 'title', $_POST['titol']);
	   Attribute::setAttribute($nova_entrada, 'description', $_POST['descripcio']);
	   $dn = 'uid='.$_POST['uid'].',ou='.$_POST['unorg'].',dc=fjeclot,dc=net';
	   $ldap->add($dn, $nova_entrada);	   
	}
?>
<html>
	<head>
		<title>
			MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP
		</title>
	</head>
	<body>
		<form action="http://zend-dacomo.fjeclot.net/zendldap2" method="POST">
			<b>Indica les dades del nou usuari que vols afegir al domini:</b><br><br>			
            <table>
				<tr>
                    <td>Identificador (login) de l'usuari: </td>
                    <td><input type=text name=uid size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Unitat organitzativa de l'usuari: </td>
                    <td><input type=text name=unorg size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>N&uacute;mero identificador de l'usuari: </td>
                    <td><input type=number name=num_uid></td>
                </tr>
                <tr>
                    <td>N&uacute;mero del grup per defecte de l'usuari: </td>
                    <td><input type=number name=num_gid></td>
                </tr>
                <tr>
                    <td>Directori personal de l'usuari: </td>
                    <td><input type=text name=directori size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Shell per defecte de l'usuari: </td>
                    <td><input type=text name=shell size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Nom de l'usuari: </td>
                    <td><input type=text name=nom size=21 maxlength=20></td>
				</tr>
                <tr>
                    <td>Cognom de l'usuari: </td>
                    <td><input type=text name=cognom size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>C&agrave;rrec o t&iacute;tol de l'usuari: </td>
                    <td><input type=text name=titol size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Tel&egrave;fon fixe de l'usuari: </td>
                    <td><input type=text name=telefon size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Tel&egrave;fon m&ograve;bil de l'usuari: </td>
                    <td><input type=text name=mobil size=21 maxlength=20></td>
                </tr>
                <tr>
                    <td>Adre&ccedil;a de l'usuari: </td>
                    <td><input type=text name=adressa size=51 maxlength=50></td>
                </tr>
                <tr>
                    <td>Descripci&oacute; de l'usuari: </td>
                    <td><input type=text name=descripcio size=51 maxlength=50></td>
                </tr>    
                <tr>
                    <td colspan=2><input type=submit value=Envia></td>
                    <td colspan=2><input type=reset value=Neteja></td>
                </tr>		
            </table>
        </form>
	</body>
</html>