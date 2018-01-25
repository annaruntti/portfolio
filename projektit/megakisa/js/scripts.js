$(document).ready(function() {

	function parseRSS(url, target, limit) {
		$.get(url, function(data) {
			var $xml = $(data);
			var i = 0;

			$xml.find("item").each(function() {
				if (i < limit || limit === null) {
					var $this = $(this),
					item = {
						title: $this.find("title").first().text(),
						link: $this.find("link").first().text(),
						description: $this.find("description").first().text(),
						pubDate: $this.find("pubDate").first().text(),
						author: $this.find("author").first().text()
					};
					var date = new Date(item.pubDate);

					var hours = String(date.getHours());
					var mins = String(date.getMinutes());
					
					$(target).append('<li><span class="kello">' + hours + ':' + mins + '</span> ' + item.title + '</li>');
				}

				
				i++;
			});
		});
	}

	parseRSS('http://anna.suomenlapinkoira.net/megakisa/js/kaleva.xml', '.rss_kaleva', 3);
});