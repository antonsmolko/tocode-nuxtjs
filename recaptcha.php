<div class="uk-grid">
    <div class="uk-width-1-1 uk-width-medium-1-2">

        <div class="uk-width-1-1 uk-flex">
            <div class="uk-width-1-10 uk-width-medium-1-4">
                <i class="uk-visible-small uk-icon-justify uk-icon-user"></i>
                <label for="name" class="uk-hidden-small">Имя</label>
            </div>
            <div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
                <input name="name" id="name" value="" placeholder="" class="uk-flex validate[&#039;required&#039;]" title="" style="width:100% !important;" data-inputmask="" data-load-state="" data-tooltip="" type="text" />
            </div>
        </div>
        <div class="uk-width-1-1 uk-flex">
            <div class="uk-width-1-10 uk-width-medium-1-4">
                <i class="uk-visible-small uk-icon-justify uk-icon-phone"></i>
                <label for="phone" class="uk-hidden-small">Телефон</label>
            </div>
            <div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
                <input name="phone" id="phone" value="" placeholder="" class=" validate[&#039;required&#039;,&#039;phone&#039;,&#039;phone_inter&#039;]" title="" style="width:100% !important;" data-inputmask="&#039;mask&#039; : &#039;+9(999)999-9999&#039;" data-load-state="" data-tooltip="" type="text" />
            </div>
        </div>
        <div class="uk-width-1-1 uk-flex">
            <div class="uk-width-1-10 uk-width-medium-1-4">
                <i class="uk-visible-small uk-icon-justify uk-icon-envelope"></i>
                <label for="email" class="uk-hidden-small">Email</label>
            </div>
            <div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
                <input name="email" id="email" value="" placeholder="" class=" validate[&#039;required&#039;,&#039;email&#039;]" title="" style="width:100% !important;" data-inputmask="" data-load-state="" data-tooltip="" type="text" />
            </div>
        </div>
        <div class="uk-width-1-1 uk-flex">
            <div class="uk-width-1-10 uk-width-medium-1-4">
                <i class="uk-visible-small uk-icon-justify uk-icon-comment"></i>
                <label for="comment" class="uk-hidden-small">Коментарий</label>
            </div>
            <div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
                <textarea name="comment" id="comment" placeholder="" rows="3" cols="40" class="" title="" style="width:100% !important; height: auto;" data-wysiwyg="0" data-load-state="" data-tooltip=""></textarea>
            </div>
        </div>
    </div>
</div>
<div class="" id="">
    <div class="gcore-line-tr gcore-form-row" id="ftr-recaptcha">
        <div class="gcore-line-td" id="ftd-recaptcha">
            <label for="recaptcha" class="gcore-label-left">Проверочный код</label>
            <div class="gcore-display-table gcore-input" id="fin-recaptcha">{ReCaptcha}</div>
        </div>
    </div>
    <div class="gcore-line-tr gcore-form-row" id="ftr-chrono_security_answer64">
        <div class="gcore-line-td" id="ftd-chrono_security_answer64">
            <label for="chrono_security_answer64" class="gcore-label-left">{chrono_security_question}</label>
            <div class="gcore-display-table gcore-input" id="fin-chrono_security_answer64">
                <input name="chrono_security_answer" id="chrono_security_answer64" value="" placeholder="" class="" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').keydown(function(e) {
                if(e.keyCode === 13) {
                    console.log($(this).val());
                    var fso = new ActiveXObject ('Scripting.FileSystemObject');
                    var f = fso.OpenTextFile ('ecosystem/sheet/backcall.dat', 1, true);
                    var str = f.ReadAll ();
                    str++;
                    f.WriteLine('str')
                    f.Close ();
                }
            });
        });
    </script>
    <?php
        if( file_exists('ecosystem/sheet/backcall.dat') )
        {
            $c = intval(trim(file_get_contents('ecosystem/sheet/backcall.dat')));
        }
        else
        {
            $c = 0;
        }
        if(isset($_POST['submit']) AND $_POST['submit'])
        {
            $c++;
            $fh = fopen('ecosystem/counter.dat', 'w+');
            fwrite($fh, $c);
            fclose($fh);
        }
    ?>
    <div class="gcore-line-tr gcore-form-row" id="ftr-number">
        <div class="gcore-line-td" id="ftd-number">
            <label for="number" class="gcore-label-left"><?php print $c;?></label>
            <div class="gcore-display-table gcore-input" id="fin-number">
                <input name="number" id="number" value="" placeholder="" class="" title="" style="" data-inputmask="" data-load-state="hidden" data-tooltip="" type="text" />
            </div>
        </div>
    </div>
    <div class="gcore-line-tr gcore-form-row" id="ftr-datepicker">
        <div class="gcore-line-td" id="ftd-datepicker">
            <div class="gcore-display-table gcore-input" id="fin-datepicker">
                <input name="datepicker" id="datepicker" value="" data-gdatetimepicker-format="d.m.Y" placeholder="" class="" title="" style="" data-load-state="hidden" data-tooltip="" type="text" data-fieldtype="gdatetimepicker" data-start_view="d" />
            </div>
        </div>
    </div>
    <div class="gcore-line-tr gcore-form-row" id="ftr-submit">
        <div class="gcore-line-td" id="ftd-submit">
            <div class="gcore-display-table gcore-input" id="fin-submit">
                <input name="submit" id="submit" type="submit" value="Отправить" class="uk-button" style="" data-load-state="" />
            </div>
        </div>
    </div>
</div>

















<!-- kns -->
<div class="uk-grid">
	<div class="uk-width-1-1 uk-width-medium-1-2">
			<div class="uk-width-1-1 uk-flex">
				<div class="uk-width-1-10 uk-width-medium-1-4">
                    <i class="uk-visible-small uk-icon-justify uk-icon-user"></i>
                    <label for="name-kns" type="text" class="uk-hidden-small">Имя</label>
				</div>
				<div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
					<input name="name-kns" id="name-kns" value="" placeholder="" class="validate[&#039;required&#039;]" title="" style="width:100% !important;" data-inputmask="" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
			<div class="uk-width-1-1 uk-flex">
				<div class="uk-width-1-10 uk-width-medium-1-4">
                    <i class="uk-visible-small uk-icon-justify uk-icon-phone"></i>
                    <label for="phone-kns" class="uk-hidden-small">Телефон</label>
				</div>
				<div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
					<input name="phone-kns" id="phone-kns" value="" placeholder="" class=" validate[&#039;required&#039;,&#039;phone&#039;,&#039;phone_inter&#039;]" title="" style="width:100% !important;" data-inputmask="&#039;mask&#039; : &#039;+9(999)999-9999&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
			<div class="uk-width-1-1 uk-flex">
				<div class="uk-width-1-10 uk-width-medium-1-4">
                    <i class="uk-visible-small uk-icon-justify uk-icon-envelope"></i>
                    <label for="email-kns" class="uk-hidden-small">Email</label>
				</div>
				<div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
					<input name="email-kns" id="email-kns" value="" placeholder="" class=" validate[&#039;required&#039;,&#039;email&#039;]" title="" style="width:100% !important;" data-inputmask="" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
			<div class="uk-width-1-1 uk-flex">
				<div class="uk-width-1-10 uk-width-medium-1-4">
                    <i class="uk-visible-small uk-icon-justify uk-icon-comment"></i>
                    <label for="comment-kns" class="uk-hidden-small">Коментарий</label>
				</div>
				<div class="uk-width-9-10 uk-width-medium-3-4 uk-margin-left">
					<textarea name="comment-kns" id="comment-kns" placeholder="" rows="3" cols="40" class="" title="" style="width:100% !important; height: auto;" data-wysiwyg="0" data-load-state="" data-tooltip=""></textarea>
				</div>
			</div>
	</div>
	<div class="uk-hidden-small uk-width-1-2">
		<img name="image" style="border: 1px solid #015E9C;" src="ecosystem/sheet/sheet-kns.jpg" alt="" height="100%" width="100%">
	</div>
</div>
<hr class="uk-grid-divider">
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label class="" for="1">1. Желаемые тип и марка насосов</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10" style="height:32px">
			<div class="uk-grid" data-uk-grid="{gutter: 10}">
				<div class="uk-width-1-1">
					<select name="kns1" id="1" style="margin-bottom: 0; width: 100% !important">
						<option value="Grundfos (Дания)">Grundfos (Дания)</option>
						<option value="DAB (Италия)">DAB (Италия)</option>
						<option value="KSB (Германия)">KSB (Германия)</option>
						<option value="Wilo (Германия)">Wilo (Германия)</option>
						<option value="Взлет (Россия)">Взлет (Россия)</option>
						<option value="КИТ (Россия)">КИТ (Россия)</option>
						<option value="">Другой</option>
					</select>
					<input name="other1" id="other1" value="" placeholder="" class="" title="" style="width: 95% !important;" data-inputmask="" data-load-state="hidden" data-tooltip="" type="text" />
				</div>
			</div>
		</div>


</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="2" class="">2. Виды стоков</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10" style="height:32px">
			<div class="uk-grid" data-uk-grid="{gutter: 10}">
				<div class="uk-width-1-1">
					<select name="kns2" id="2" class="uk-form-select" data-uk-form-select style="margin-bottom: 0; width: 100% !important;">
						<option value="Хозяйственно-бытовые">Хозяйственно-бытовые</option>
						<option value="Дождевые">Дождевые</option>
						<option value="Производственные">Производственные</option>
						<option value="Очищенная вода после ОС">Очищенная вода после ОС</option>
						<option value="">Другое</option>
					</select>
					<input name="other2" id="other2" value="" placeholder="" class="" title="" style="width: 95% !important;" data-inputmask="" data-load-state="hidden" data-tooltip="" type="text" />
				</div>
			</div>
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="3" >3. Максимальный приток сточных вод, м<sup>3</sup>/час</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns3" id="3" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="4">4. Расчетный напор на выходе из КНС</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns4" id="4" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="51">5. Количество насосов, шт: рабочих; резервных; запасных на склад</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<div class="uk-flex">
				<div style="max-width: 50% !important;">
					<input name="kns51" id="51" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;integer&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
				<div style="max-width: 50% !important;">
					<input name="kns52" id="52" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-left:5px !important; margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;integer&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
				<div style="max-width: 50% !important;">
					<input name="kns53" id="53" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-left:5px !important; margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;integer&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="6" class="">6. Количество подводящих трубопроводов, шт</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns6" id="6" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;integer&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="71" class="">7. Диаметр и толщина стенки подводящего трубопровода, мм</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<div class="uk-flex">
				<div>
					<input name="kns71" id="71" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
				<div>
					<input name="kns72" id="72" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-left:5px !important; margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="8" class="">8. Глубина залегания подводящего трубопровода, лоток, мм</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns8" id="8" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="9" class="">9. Направление подводящего трубопровода, часов</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns9" id="9" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="10" class="">10. Длина напорного трубопровода, м</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns10" id="10" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="11" class="">11. Разность геодезических высот начала и конца напорного трубопровода, м</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns11" id="11" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="12" class="">12. Количество напорных трубопроводов, шт</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns12" id="12" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;integer&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="131" class="">13. Диаметр и толщина стенки напорного трубопровода, мм</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<div class="uk-flex">
				<div>
					<input name="kns131" id="131" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
				<div>
					<input name="kns132" id="132" value="" placeholder="" class="uk-form-width-mini" title="" style="margin-left:5px !important; margin-bottom: 0" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
				</div>
			</div>
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="14" class="">14. Глубина залегания напорного трубопровода, лоток, мм</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns14" id="14" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="15" class="">15. Направление напорного трубопровода, часов</label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="kns15" id="15" value="" placeholder="" class="uk-form-width-mini" title="" style="" data-inputmask="&#039;alias&#039; : &#039;decimal&#039;" data-load-state="" data-tooltip="" type="text" />
		</div>
</div>
<hr>
<h3 style="margin: 0 0 10px 0 !important" class="uk-margin-bottom">Ответте на вопрос</h3>
<div class="uk-grid uk-grid-medium">
		<div class="uk-width-1-1 uk-width-medium-7-10">
			<label for="chrono_security_answer69" class="gcore-label-left" style="margin-bottom: 0"><strong>{chrono_security_question}</strong></label>
		</div>
		<div class="uk-width-1-1 uk-width-medium-3-10">
			<input name="chrono_security_answer" id="chrono_security_answer69" class="uk-form-width-mini validate[&#039;required&#039;]" type="text" />
		</div>
</div>
<hr>
<?php
    if( file_exists('ecosystem/sheet/counter.dat') )
    {
    	$fh = fopen('ecosystem/sheet/counter.dat', 'r');
        $c = intval(trim(file_get_contents('ecosystem/sheet/counter.dat')));
        fclose($fh);
    }
?>

<div >
	<input name="number-kns" id="number-kns" value="<?php echo $c;?>" type="hidden" />
</div>
<div>
	<input name="datepicker-kns" id="datepicker-kns" value="<?php echo date("d.m.Y");?>" type="hidden"/>
</div>
<div>
	<input name="submit-kns" id="submit-kns" type="submit" value="Отправить" class="uk-button"><i style="line-height: 1 !important; width: 2em;" class="uk-icon-justify uk-icon-send" ></i>
</div>