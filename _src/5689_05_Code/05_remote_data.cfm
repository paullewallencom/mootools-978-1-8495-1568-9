<!--- 2011-02-03 jjohnston retrieve external data for ajax --->
<cfhttp url='http://webjuju.com/moo/05_remote_data.txt'>
<cfoutput>#cfhttp.fileContent#</cfoutput>
