<h3>Path traversal:</h3>
<H4>-it occurs when attakers manipulates paths to gain unauthorized access to files and directories outside the intended directory

</h4>
-they can manipulate the path to ccontain password to access sensitive system files
</h4>

</h4>
-laravel provides request validation to alwayes validate users inputs
</h4>




<h3>Double URL Encoding:</h3>

<H4>-Many web servers tend to perform the decoding process more than once in different parts of the code. As a result, attackers are aware that Double URL encoding can be used as an evasion technique that bypasses many security mechanisms, such as access control, authentication, and so on.
</h4>

</h4>
- he attacker takes a character, such as ’/’ (which is normally used in Directory Traversal attacks), and double encodes it. The encoded value of this character is normally %2F, and its double encoded value is %252F. When the request is processed by the web server it may be decoded once before being sent to the security analyzer (for instance, the Directory Traversal protection looking for a ../ string). At this point, however, %252F has been decoded back only one step into %2F, which appears to be harmless. After the security analysis has been completed, it is sent through another part of the code which decodes it again, now to its real value of ’/’, which may be harmful at that time.
</h4>

</h4>
-Possible Attacks

While nearly every attack can be camouflaged using Double URL Encoding, the attack in which this technique is used most often is Directory Traversal where this technique is used to camouflage the / or \ characters. Other common attacks that use this method are Cross Site Scripting and SQL Injection that also rely on specific characters that are filtered many times by the application.
</h4>
