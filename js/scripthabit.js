$('#edit').click(function() {
    var id = $(this).attr('data-id')
    if (!!habits[id]) {
        var _form = $('#habit-form')
        _form.find('[name="id"]').val(id)
        _form.find('[name="habit"]').val(habits[id].text)
        _form.find('[name="reps"]').val(habits[id].reps)
        _form.find('[name="timeframe"]').val(habits[id].timeframe)
        _form.find('[name="habit"]').focus()
    } else {
        alert("Habit is undefined");
    }
});