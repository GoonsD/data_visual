console.log(val);

            let givenDate = val;

            let dateArr = Array.from(givenDate);

            let setOfDay = [];

            let setOfMonth = [];

            let setOfYear = [];

            let day = dateArr.slice(0, 2).toString();

            for (let i = 0; i < day.length; i++) {
                if (i === 1)
                    continue;
                setOfDay.push(day[i]);
            }

            let month = dateArr.slice(3, 5).toString();

            for (let i = 0; i < month.length; i++) {
                if (i === 1)
                    continue;
                setOfMonth.push(month[i]);
            }

            let year = dateArr.slice(6).toString();

            for (let i = 0; i < year.length; i++) {
                if (i === 1 || i === 3 || i === 5)
                    continue;
                setOfYear.push(year[i]);
            }

            let subFormattedDate = [];

            const newDate = function (arr) {
                for (let i of arr) {
                    subFormattedDate.push(i);
                }
            };

            newDate(setOfYear);
            newDate(setOfMonth);
            newDate(setOfDay);

            let firstDateFormat = subFormattedDate.splice(4, 0, "-");

            let secondDateFormat = subFormattedDate.splice(7, 0, "-");

            let goonsDate = subFormattedDate.join("");

            console.log(goonsDate);