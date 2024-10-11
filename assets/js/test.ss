function service(request, response) {
    try {
       

        response.writeLine("File Called");

   

    } catch (e) {
        nlapiLogExecution('debug', 'Test Services', 'e.message=' + e.message);

        response.writeLine(e.message);
    }
}

