<?php
/**
 * Theme customizer controls
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/** Multiple Category Select Control */
class Block_Lite_Multiple_Select_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'multiple-select';

	/**
	 * Displays the multiple select on the customize screen.
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<?php
				foreach ( $this->choices as $value => $label ) {
					$selected = ( in_array( $value, $this->value() ) ) ? selected( 0, 0, false ) : '';
					echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html( $label ) . '</option>';
				}
				?>
			</select>
		</label>
		<?php
	}
}
