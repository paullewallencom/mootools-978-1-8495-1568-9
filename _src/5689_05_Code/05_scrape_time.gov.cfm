<!--- 2011-02-05 jjohnston retrieve external data for ajax --->
<cfhttp url='http://www.time.gov/timezone.cgi?Central/d/-6'>
<cfoutput>#cfhttp.fileContent#</cfoutput>
