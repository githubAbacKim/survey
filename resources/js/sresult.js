$(function () {
	var divArray = [$(".a"), $(".b"), $(".c"), $(".d"), $(".e"), $(".f")];

	var answerArray = [1, 2, 3, 4, 5, 6, 7];
	for (let i = 0; i < divArray.length; i++) {
		divArray[i].text(answerArray[i]);
	}
});
