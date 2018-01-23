// JavaScript Document

function ConfirmDelete(nameOfObjectToDelete)
{
	if(confirm("Are You Sure You Want To Delete This "+nameOfObjectToDelete))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function confirmAny(msg)
{
	if(confirm(msg))
	{
		return true;
	}
	else
	{
		return false;
	}
}