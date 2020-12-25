<!--- 2011-02-10 jjohnston process calculator post --->

<!--- cf default hoo ha --->
<cfparam name="form.input_0" default="">
<cfparam name="form.input_1" default="">
<cfparam name="form.input_2" default="">
<cfparam name="i_0" default="#form.input_0#">
<cfparam name="i_1" default="#form.input_1#">
<cfparam name="i_2" default="#form.input_2#">

<!--- question 1 loads with the page --->

<!--- question 2 --->
<cfif i_1 eq ''><cfset two=true><cfelse><cfset two=false></cfif>

<!--- question 3 --->
<cfif i_1 neq '' AND i_2 eq ''><cfset three=true><cfelse><cfset three=false></cfif>

<!--- send answer? --->
<cfif i_2 neq ''><cfset answer=true><cfelse><cfset answer=false></cfif>


<!--- send new question or send final calcuation response --->
<cfif two>
    <cfoutput>{"question":"Enter your monthly, non-housing (rent/mortgage) debt payments:","i_0":"#i_0#","i_1":"#i_1#","i_2":"#i_2#"}</cfoutput>
<cfelseif three>
    <cfoutput>{"question":"Enter your monthly rent or mortgage payment:"}</cfoutput>
<cfelse>
    <cfset recommendations = ''>
    <cfset housing2income = int(i_2)/int(i_0)>
    <cfif housing2income gt .25><cfset recommendations = "#recommendations# Reduce housing to less than 25% of gross monthly income<br/>"></cfif>
    <cfset totaldebt2income = (int(i_2)+int(i_1))/int(i_0)>
    <cfif totaldebt2income gt .38><cfset recommendations = "#recommendations# Reduce combined housing and debt payments to less than 38% of gross monthly income<br/>"></cfif>
    <cfif recommendations eq ''><cfset recommendations = "Your ratios look good; stay under less than 38% of gross income for combined housing and debt payments!"></cfif>
    <cfset answer = "<h2>Monthly Stats</h2>Income: $#numberformat(int(i_0))#<br/>Debt: $#numberformat(int(i_1))#<br/>Housing: $#numberformat(int(i_2))#<h3>Recommendations:</h3>#recommendations#">
    <cfoutput>{"answer":"#answer#"}</cfoutput>
</cfif>
