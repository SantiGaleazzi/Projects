(function (window, document, $, apiName) {

	var MauticJS = window[apiName] = window[apiName] || {};

	/**
	 * @param formID (string/integer) which Mautic form to submit this data to
	 * @param parameters (object) expects object with name: 'value' pairs
	 * @param callback (function) a function to call after async response is received from Mautic
	 */
	function submitMauticForm(formID, parameters, callback) {
		if(typeof MauticJS.makeCORSRequest !== "function") {
			console.log('Error Mirroring Form: Mautic API not found');
			return false;
		}
		var urlEncodedData = "",
			urlEncodedDataPairs = [];


		urlEncodedDataPairs.push('mauticform%5BformId%5D=' + encodeURIComponent(formID));
		urlEncodedDataPairs.push('mauticform%5Breturn%5D=');

		// loop through parameters and append them to the data array to send
		if (typeof parameters === 'object') {
			for (var x in parameters) {
				urlEncodedDataPairs.push('mauticform%5B' + encodeURIComponent(x) + '%5D=' + encodeURIComponent(parameters[x]));
			}
		}

		// Combine the pairs into a single string and replace all %-encoded spaces to 
		// the '+' character; matches the behaviour of browser form submissions.
		urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

		MauticJS.makeCORSRequest('POST', 'https://ma.oventionovens.com/form/submit?formId=' + encodeURIComponent(formID), urlEncodedData, function (response, xhr) {
			if (typeof callback === 'function') {
				callback(response, xhr);
			}
		});

		return true;
	}

	function getLinkedForms() {
		return Array.prototype.slice.call(document.querySelectorAll('form')).filter(function (el) {
			return el.className.match(/_mauticId_\d+/);
		});
	}

	function getLinkedFields(form) {
		return Array.prototype.slice.call(form.querySelectorAll('li')).filter(function (el) {
			return el.className.match(/_mautic_/);
		});
	}

	function getFieldValues(fieldListEntry) {
		var values = [];
		values = Array.prototype.slice.call(fieldListEntry.querySelectorAll('input,textarea')).map(function (el) {
			return el.value;
		});
		values = values.concat(Array.prototype.slice.call(fieldListEntry.querySelectorAll('select')).map(function (el) {
			return Array.prototype.map.call(el.selectedOptions, function (option) {
				return option.text;
			}).join(", ");
		}));
		return values;
	}
	
	function isFinalSubmit(form){
		var targetPage = form.querySelector('input[name^="gform_target_page_number"]');
		
		if(targetPage && targetPage.value !== "0"){
			return false;
		} else {
			return true;
		}
		
	}

	function getFieldNames(fieldListEntry) {
		return fieldListEntry.className.match(/_mautic_(\w+)/g).map(function (className) {
			return className.replace(/_mautic_/, '');
		});
	}

	function getFormId(form) {
		var matches = form.className.match(/_mauticId_(\d+)/);
		if (matches && matches.length) {
			return matches[1];
		}
	}

	function interceptSubmit(event) {
		var fieldEntries, mauticData, timeout, myId;
		
		if(!isFinalSubmit(this)){
			console.log('false alarm - not the last page');
			myId = this.id + '';
			setTimeout(function(){
				$('#' + myId).on('submit', interceptSubmit);
			},1000)
			return true;
		} else {
			console.log('we have a submit!');
		}
		
		if (this.dataset.mauticSuccess) {
			return true;
		}
		event.preventDefault();

		timeout = setTimeout(function () {
			this.submit();
		}.bind(this), 2500);

		fieldEntries = getLinkedFields(this);

		mauticData = fieldEntries.reduce(function (mauticData, entry) {
			var fieldNames, fieldValues;
			fieldNames = getFieldNames(entry);
			fieldValues = getFieldValues(entry);
			if (fieldNames.length && fieldNames.length === fieldValues.length) {
				for (var i = 0; i < fieldNames.length; i++) {
					mauticData[fieldNames[i]] = fieldValues[i];
				}
			}
			return mauticData;
		}, {});

		submitMauticForm(getFormId(this), mauticData, function () {
			this.dataset.mauticSuccess = true;
			clearTimeout(timeout);
			this.submit();
		}.bind(this));
		
		return false;
	}

	function onDomReady() {
		var forms = getLinkedForms();
		for (var i = 0; i < forms.length; i++) {
			console.log('Attaching event listener to form', forms[i]);
			if($ && typeof $ === 'function') { 
				$('#' + forms[i].id).on('submit', interceptSubmit);				
			} else {
				forms[i].addEventListener('submit', interceptSubmit);
			}
		}
	}
	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", onDomReady);
	} else { // `DOMContentLoaded` already fired
		onDomReady();
	}

}(window, document, jQuery, 'MauticJS'));
