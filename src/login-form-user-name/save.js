/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Save function to render the block's frontend output.
 *
 * @return {Element} The saved content of the block.
 */
export default function save() {
    return (
        <div { ...useBlockProps.save() }>
            <label htmlFor="userNameInput" className="form-label">User Name</label>
            <input type="text" className="form-control" id="userNameInput" placeholder="Enter your user name" />
        </div>
    );
}