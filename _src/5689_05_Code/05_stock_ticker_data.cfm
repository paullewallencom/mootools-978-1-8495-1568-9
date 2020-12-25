<!--- jjohnston 2011-02-11 get stock ticker data from quoterss --->

<cfset baseurl = 'http://www.quoterss.com/quote.php?symbol='>

<cfset feed_data = arraynew(1)>
<cfset counter = 0>

<cftry>
<cfloop list = 'IBM,APPL,GOOG' index='feed'>

  <cfset myurl = baseurl & feed>
  <cfhttp url = #myurl#>
  
  <cfscript>
    // regex out the feed data
    match = refindnocase('<item>.*<title>QuoteRss.com: (#feed#[^<]*)</title>',cfhttp.fileContent,1,true);
  </cfscript>

  <cfset infomatch = #mid(cfhttp.fileContent,match.pos[2],match.len[2])#>

  <cfset symbol = replace(feed,'"','\"','all')>
  <cfset info = replace(infomatch,'"','\"','all')>
  <cfset arrayappend(feed_data,'"#counter#":"#info#"')>
  <cfset counter = counter + 1>

</cfloop>
<cfset data = arraytolist(feed_data)>

<!--- poor man's encoding is ironic with colf fusion licensing driving it, eh? --->
<cfoutput>{#data#}</cfoutput>

<cfcatch>
<cfoutput>{"Error":"Feed unavailable, please try again later or use another domain - such as is with free services."}</cfoutput>
</cfcatch>
</cftry>
